<?php
// Save (create/update) activity using prepared statements
require_once __DIR__ . '/../config/config.php';

function redirect($ok = true) {
    $status = $ok ? 'success' : 'error';
    header("Location: ../activities.php?status=$status");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect(false);
}

// Inputs
$id         = isset($_POST['id']) ? trim($_POST['id']) : '';
$title      = isset($_POST['title']) ? trim($_POST['title']) : '';
$location   = isset($_POST['location']) ? trim($_POST['location']) : '';
$category   = isset($_POST['category']) ? trim($_POST['category']) : '';
$price      = isset($_POST['price']) ? (float)$_POST['price'] : 0.0;
$duration   = isset($_POST['duration']) ? trim($_POST['duration']) : '';
$existing_image  = isset($_POST['existing_image_url']) ? trim($_POST['existing_image_url']) : '';
$short_desc = isset($_POST['short_desc']) ? trim($_POST['short_desc']) : '';
$status     = isset($_POST['status']) ? (int)$_POST['status'] : 1;

if ($title === '' || $location === '' || $category === '' || $duration === '' || $short_desc === '') {
    redirect(false);
}

// Handle image upload (optional on edit)
$image_url = $existing_image; // default to existing
if (isset($_FILES['image_file']) && is_array($_FILES['image_file']) && $_FILES['image_file']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['image_file'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        redirect(false);
    }
    $maxSize = 5 * 1024 * 1024; // 5MB
    if ($file['size'] > $maxSize) {
        redirect(false);
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
    if (!isset($allowed[$mime])) {
        redirect(false);
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
    $activitiesDir = __DIR__ . '/../../assets/images/activities';
    if (!is_dir($activitiesDir)) {
        @mkdir($activitiesDir, 0775, true);
    }
    $filename = 'act_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $targetPath = $activitiesDir . '/' . $filename;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        redirect(false);
    }
    // Web-accessible relative path
    $image_url = 'assets/images/activities/' . $filename;
}

// Ensure table exists (safety)
$conn->query("CREATE TABLE IF NOT EXISTS activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) DEFAULT 0,
    duration VARCHAR(100) NOT NULL,
    image_url TEXT NOT NULL,
    short_desc TEXT NOT NULL,
    status TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$ok = false;

if ($id !== '') {
    // Update
    $sql = "UPDATE activities SET title=?, location=?, category=?, price=?, duration=?, image_url=?, short_desc=?, status=?, updated_at=NOW() WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $id_int = (int)$id;
        // types: s s s d s s s i i => 'sssdsssii'
        $stmt->bind_param('sssdsssii', $title, $location, $category, $price, $duration, $image_url, $short_desc, $status, $id_int);
        $ok = $stmt->execute();
        $stmt->close();
    }
} else {
    // Insert
    $sql = "INSERT INTO activities (title, location, category, price, duration, image_url, short_desc, status, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    if ($stmt = $conn->prepare($sql)) {
        // types: s s s d s s s i => 'sssdsssi'
        $stmt->bind_param('sssdsssi', $title, $location, $category, $price, $duration, $image_url, $short_desc, $status);
        $ok = $stmt->execute();
        $stmt->close();
    }
}

redirect($ok);
