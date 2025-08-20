<?php
session_start();
require_once '../config/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $excerpt = trim($_POST['excerpt']);
    $content = trim($_POST['content']);
    $tags = trim($_POST['tags']);
    $status = (int)$_POST['status'];
    
    // Handle image upload
    $image_url = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = '../../assets/images/blog/';
        
        // Create directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($file_extension, $allowed_extensions)) {
            $new_filename = 'blog_' . time() . '_' . uniqid() . '.' . $file_extension;
            $upload_path = $upload_dir . $new_filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image_url = 'assets/images/blog/' . $new_filename;
            }
        }
    }
    
    // Insert into database
    $sql = "INSERT INTO blogs (title, category, excerpt, content, tags, image_url, status, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $title, $category, $excerpt, $content, $tags, $image_url, $status);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Article saved successfully!";
    } else {
        $_SESSION['error'] = "Error saving article: " . $conn->error;
    }
    
    $stmt->close();
}

// Redirect back to blog page
header("Location: ../blog.php");
exit();
?>
