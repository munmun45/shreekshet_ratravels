<?php
// Save (create/update) destination using prepared statements
require_once __DIR__ . '/../config/config.php';

// Basic error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', '0');

// Simple logger
$__logDir = __DIR__ . '/../logs';
if (!is_dir($__logDir)) { @mkdir($__logDir, 0775, true); }
$__logFile = $__logDir . '/destinations.log';
function dlog($msg){
    global $__logFile;
    @file_put_contents($__logFile, '['.date('Y-m-d H:i:s')."] " . $msg . "\n", FILE_APPEND);
}

function redirect($ok = true, $msg = '') {
    $status = $ok ? 'success' : 'error';
    $qs = "status=$status";
    if ($msg !== '') { $qs .= '&msg=' . urlencode($msg); }
    header("Location: ../destination.php?$qs");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    dlog('Invalid request method: ' . $_SERVER['REQUEST_METHOD']);
    redirect(false, 'invalid_request');
}

// Inputs
$id         = isset($_POST['id']) ? trim($_POST['id']) : '';
$title      = isset($_POST['title']) ? trim($_POST['title']) : '';
$location   = isset($_POST['location']) ? trim($_POST['location']) : '';
$category   = isset($_POST['category']) ? trim($_POST['category']) : '';
$price      = isset($_POST['price']) ? (float)$_POST['price'] : 0.0;
$existing_image  = isset($_POST['existing_image_url']) ? trim($_POST['existing_image_url']) : '';
$cropped_dataurl = isset($_POST['cropped_image']) ? trim($_POST['cropped_image']) : '';
$short_desc = isset($_POST['short_desc']) ? trim($_POST['short_desc']) : '';
$status     = isset($_POST['status']) ? (int)$_POST['status'] : 1;

if ($title === '' || $location === '' || $category === '' || $short_desc === '') {
    dlog('Validation failed: missing required fields');
    redirect(false, 'missing_fields');
}

// Handle image upload (optional on edit)
$image_url = $existing_image; // default to existing

// 1) If cropped image data URL provided, prefer it
if ($cropped_dataurl !== '') {
    // Expect formats like: data:image/png;base64,XXXXX
    if (preg_match('/^data:(image\/(png|jpeg|jpg|webp));base64,(.+)$/i', $cropped_dataurl, $m)) {
        $mime = strtolower($m[1]);
        $sub  = strtolower($m[2]);
        $base64 = $m[3];
        $ext = $sub === 'jpeg' ? 'jpg' : ($sub === 'jpg' ? 'jpg' : ($sub === 'png' ? 'png' : 'webp'));
        $bin = base64_decode($base64);
        if ($bin !== false) {
            $destDir = __DIR__ . '/../../assets/images/destinations';
            if (!is_dir($destDir)) { @mkdir($destDir, 0775, true); }
            $filename = 'dst_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
            $targetPath = $destDir . '/' . $filename;
            if (@file_put_contents($targetPath, $bin) !== false) {
                $image_url = 'assets/images/destinations/' . $filename;
            }
        }
    }
}

// 2) Else, fall back to raw file upload if present
if ($cropped_dataurl === '' && isset($_FILES['image_file']) && is_array($_FILES['image_file']) && $_FILES['image_file']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['image_file'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        dlog('Upload error code: ' . $file['error']);
        redirect(false, 'upload_error');
    }
    $maxSize = 5 * 1024 * 1024; // 5MB
    if ($file['size'] > $maxSize) {
        dlog('Upload too large: ' . $file['size']);
        redirect(false, 'file_too_large');
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
    if (!isset($allowed[$mime])) {
        dlog('Invalid mime: ' . $mime);
        redirect(false, 'invalid_file');
    }
    $ext = $allowed[$mime];
    $uploadsDir = realpath(__DIR__ . '/../../assets/images');
    if ($uploadsDir === false) {
        // Attempt to create base directory if missing
        $base = __DIR__ . '/../../assets/images';
        if (!is_dir($base)) {
            @mkdir($base, 0775, true);
        }
        $uploadsDir = realpath($base);
    }
    $destDir = __DIR__ . '/../../assets/images/destinations';
    if (!is_dir($destDir)) {
        @mkdir($destDir, 0775, true);
    }
    $filename = 'dst_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $targetPath = $destDir . '/' . $filename;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        dlog('move_uploaded_file failed to: ' . $targetPath);
        redirect(false, 'upload_move_fail');
    }
    // Web-accessible relative path
    $image_url = 'assets/images/destinations/' . $filename;
}

// Ensure table exists (safety)
$createOk = $conn->query("CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) DEFAULT 0,
    image_url TEXT NOT NULL,
    short_desc TEXT NOT NULL,
    status TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
if (!$createOk) { dlog('Table create error: ' . $conn->error); }

$ok = false;

if ($id !== '') {
    // Update
    $sql = "UPDATE destinations SET title=?, location=?, category=?, price=?, image_url=?, short_desc=?, status=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $id_int = (int)$id;
        // types order: s,s,s,d,s,s,i,i
        $stmt->bind_param('sssdssii', $title, $location, $category, $price, $image_url, $short_desc, $status, $id_int);
        $ok = $stmt->execute();
        if (!$ok) { dlog('Update execute error: ' . $stmt->error); }
        $stmt->close();
    } else { dlog('Update prepare failed: ' . $conn->error); }
} else {
    // Insert
    $sql = "INSERT INTO destinations (title, location, category, price, image_url, short_desc, status)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        // types order: s,s,s,d,s,s,i
        $stmt->bind_param('sssdssi', $title, $location, $category, $price, $image_url, $short_desc, $status);
        $ok = $stmt->execute();
        if (!$ok) { dlog('Insert execute error: ' . $stmt->error); }
        $stmt->close();
    } else { dlog('Insert prepare failed: ' . $conn->error); }
}

if (!$ok && $conn && $conn->error) { dlog('Conn error: ' . $conn->error); }
redirect($ok, $ok ? 'saved' : 'db_error');
