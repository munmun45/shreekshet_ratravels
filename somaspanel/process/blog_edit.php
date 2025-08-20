<?php
session_start();
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $excerpt = trim($_POST['excerpt']);
    $content = trim($_POST['content']);
    $tags = trim($_POST['tags']);
    $status = (int)$_POST['status'];
    
    // Handle image upload
    $image_url = $_POST['existing_image']; // Keep existing image by default
    
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
                // Delete old image if exists
                if (!empty($image_url) && file_exists('../../' . $image_url)) {
                    unlink('../../' . $image_url);
                }
                $image_url = 'assets/images/blog/' . $new_filename;
            }
        }
    }
    
    // Update database
    $sql = "UPDATE blogs SET title=?, category=?, excerpt=?, content=?, tags=?, image_url=?, status=?, updated_at=NOW() WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssii", $title, $category, $excerpt, $content, $tags, $image_url, $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Article updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating article: " . $conn->error;
    }
    
    $stmt->close();
}

// Redirect back to blog page
header("Location: ../blog.php");
exit();
?>
