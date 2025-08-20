<?php
header('Content-Type: application/json');
$response = ['success' => false, 'message' => 'Unknown error'];

try {
    require_once __DIR__ . '/../config/config.php'; // provides $conn (mysqli)

    if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
        throw new Exception('DB connection not available');
    }

    // Ensure status column exists (safe migration across MySQL/MariaDB)
    $hasStatus = false;
    if ($res = $conn->query("SHOW COLUMNS FROM activity_bookings LIKE 'status'")) {
        $hasStatus = $res->num_rows > 0;
        $res->close();
    }
    if (!$hasStatus) {
        @$conn->query("ALTER TABLE activity_bookings ADD COLUMN status VARCHAR(20) NOT NULL DEFAULT 'pending'");
    }

    // Validate input
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $status = isset($_POST['status']) ? trim($_POST['status']) : '';

    if ($id <= 0) throw new Exception('Invalid booking ID');

    $allowed = ['pending', 'confirmed', 'cancelled', 'completed'];
    if (!in_array($status, $allowed, true)) {
        throw new Exception('Invalid status');
    }

    $stmt = $conn->prepare('UPDATE activity_bookings SET status = ? WHERE id = ?');
    if (!$stmt) throw new Exception('Prepare failed: ' . $conn->error);
    $stmt->bind_param('si', $status, $id);
    if (!$stmt->execute()) {
        $stmt->close();
        throw new Exception('Update failed: ' . $conn->error);
    }
    $affected = $stmt->affected_rows;
    $stmt->close();

    $response['success'] = $affected >= 0; // even if same value, treat as success
    $response['message'] = 'Status updated';
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>
