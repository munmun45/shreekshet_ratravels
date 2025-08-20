<?php
// Delete activity by ID
require_once __DIR__ . '/../config/config.php';

function redirect($ok = true) {
    $status = $ok ? 'success' : 'error';
    header("Location: ../activities.php?status=$status");
    exit;
}

// Accept id via GET or POST
$id = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} elseif (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
}

if (!$id || $id <= 0) {
    redirect(false);
}

// Ensure table exists (defensive)
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
$sql = "DELETE FROM activities WHERE id=?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('i', $id);
    $ok = $stmt->execute();
    $stmt->close();
}

redirect($ok);
