<?php
session_start();
require_once __DIR__ . '/../config/config.php';

$response = ['success' => false, 'message' => 'Unknown error'];

try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if ($id <= 0) {
        throw new Exception('Invalid car ID');
    }

    // Get car details first to delete image file
    $stmt = $conn->prepare("SELECT image_url FROM cars WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();
    $stmt->close();

    if (!$car) {
        throw new Exception('Car not found');
    }

    // Delete the car record
    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        // Delete image file if it exists
        if (!empty($car['image_url'])) {
            $image_path = __DIR__ . '/../../' . $car['image_url'];
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }
        
        $response['success'] = true;
        $response['message'] = 'Car deleted successfully';
    } else {
        throw new Exception('Failed to delete car: ' . $conn->error);
    }
    
    $stmt->close();

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

// Redirect back with status
$status = $response['success'] ? 'success' : 'error';
$msg = urlencode($response['message']);
header("Location: ../car.php?status=$status&msg=$msg");
exit;
?>
