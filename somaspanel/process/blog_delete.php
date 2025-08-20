<?php
session_start();
require_once '../config/config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // First get the image URL to delete the file
    $sql = "SELECT image_url FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $image_url = $row['image_url'];
        
        // Delete the article from database
        $delete_sql = "DELETE FROM blogs WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        
        if ($delete_stmt->execute()) {
            // Delete the image file if it exists
            if (!empty($image_url) && file_exists('../../' . $image_url)) {
                unlink('../../' . $image_url);
            }
            $_SESSION['success'] = "Article deleted successfully!";
        } else {
            $_SESSION['error'] = "Error deleting article: " . $conn->error;
        }
        
        $delete_stmt->close();
    } else {
        $_SESSION['error'] = "Article not found!";
    }
    
    $stmt->close();
} else {
    $_SESSION['error'] = "Invalid article ID!";
}

header("Location: ../blog.php");
exit();
?>
