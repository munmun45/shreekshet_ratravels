<?php
session_start();
require_once __DIR__ . '/../config/config.php';

$response = ['success' => false, 'message' => 'Unknown error'];

try {
    // Ensure table exists
    $conn->query("CREATE TABLE IF NOT EXISTS cars (
        id INT AUTO_INCREMENT PRIMARY KEY,
        car_name VARCHAR(255) NOT NULL,
        car_model VARCHAR(255) NOT NULL,
        car_type VARCHAR(100) NOT NULL,
        seating_capacity INT NOT NULL DEFAULT 4,
        price_per_day DECIMAL(10,2) DEFAULT 0,
        price_per_km DECIMAL(10,2) DEFAULT 0,
        image_url TEXT NOT NULL,
        features TEXT,
        status TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Get form data
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $car_name = trim($_POST['car_name'] ?? '');
    $car_model = trim($_POST['car_model'] ?? '');
    $car_type = trim($_POST['car_type'] ?? '');
    $seating_capacity = (int)($_POST['seating_capacity'] ?? 4);
    $price_per_day = (float)($_POST['price_per_day'] ?? 0);
    $price_per_km = (float)($_POST['price_per_km'] ?? 0);
    $features = trim($_POST['features'] ?? '');
    $status = (int)($_POST['status'] ?? 1);
    $existing_image_url = trim($_POST['existing_image_url'] ?? '');

    // Validation
    if (empty($car_name)) throw new Exception('Car name is required');
    if (empty($car_model)) throw new Exception('Car model is required');
    if (empty($car_type)) throw new Exception('Car type is required');
    if ($seating_capacity < 2 || $seating_capacity > 50) throw new Exception('Seating capacity must be between 2 and 50');
    if ($price_per_day <= 0) throw new Exception('Price per day must be greater than 0');
    if ($price_per_km <= 0) throw new Exception('Price per KM must be greater than 0');

    // Handle image upload
    $image_url = $existing_image_url;
    
    // Check for cropped image first
    if (!empty($_POST['cropped_image'])) {
        $cropped_data = $_POST['cropped_image'];
        if (strpos($cropped_data, 'data:image/') === 0) {
            // Extract image data
            $image_parts = explode(',', $cropped_data);
            if (count($image_parts) === 2) {
                $image_data = base64_decode($image_parts[1]);
                if ($image_data !== false) {
                    // Create uploads directory if it doesn't exist
                    $upload_dir = __DIR__ . '/../../assets/images/cars/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0755, true);
                    }
                    
                    // Generate unique filename
                    $filename = 'car_' . time() . '_' . uniqid() . '.jpg';
                    $filepath = $upload_dir . $filename;
                    
                    if (file_put_contents($filepath, $image_data)) {
                        $image_url = 'assets/images/cars/' . $filename;
                        
                        // Delete old image if updating
                        if ($id > 0 && !empty($existing_image_url) && $existing_image_url !== $image_url) {
                            $old_path = __DIR__ . '/../../' . $existing_image_url;
                            if (file_exists($old_path)) {
                                @unlink($old_path);
                            }
                        }
                    }
                }
            }
        }
    }
    // Fallback to regular file upload if no cropped image
    elseif (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../../assets/images/cars/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $file_info = pathinfo($_FILES['image_file']['name']);
        $extension = strtolower($file_info['extension']);
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        
        if (!in_array($extension, $allowed)) {
            throw new Exception('Only JPG, PNG, and WebP images are allowed');
        }
        
        $filename = 'car_' . time() . '_' . uniqid() . '.' . $extension;
        $filepath = $upload_dir . $filename;
        
        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $filepath)) {
            $image_url = 'assets/images/cars/' . $filename;
            
            // Delete old image if updating
            if ($id > 0 && !empty($existing_image_url) && $existing_image_url !== $image_url) {
                $old_path = __DIR__ . '/../../' . $existing_image_url;
                if (file_exists($old_path)) {
                    @unlink($old_path);
                }
            }
        }
    }

    // Ensure we have an image URL
    if (empty($image_url)) {
        throw new Exception('Car image is required');
    }

    // Insert or update
    if ($id > 0) {
        // Update existing car
        $stmt = $conn->prepare("UPDATE cars SET car_name=?, car_model=?, car_type=?, seating_capacity=?, price_per_day=?, price_per_km=?, image_url=?, features=?, status=? WHERE id=?");
        $stmt->bind_param('sssiidssii', $car_name, $car_model, $car_type, $seating_capacity, $price_per_day, $price_per_km, $image_url, $features, $status, $id);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Car updated successfully';
        } else {
            throw new Exception('Failed to update car: ' . $conn->error);
        }
    } else {
        // Insert new car
        $stmt = $conn->prepare("INSERT INTO cars (car_name, car_model, car_type, seating_capacity, price_per_day, price_per_km, image_url, features, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssiidssi', $car_name, $car_model, $car_type, $seating_capacity, $price_per_day, $price_per_km, $image_url, $features, $status);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Car added successfully';
        } else {
            throw new Exception('Failed to add car: ' . $conn->error);
        }
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
