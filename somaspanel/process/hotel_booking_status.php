<?php
require_once __DIR__ . '/../config/config.php'; // provides $conn
header('Content-Type: application/json');

$id = $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

$allowed = ['pending','confirmed','cancelled','completed'];

if(!$id || !in_array($status, $allowed)){
    echo json_encode(['success'=>false,'message'=>'Invalid input']);
    exit;
}

$stmt = $conn->prepare("UPDATE hotel_bookings SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);

if($stmt->execute()){
    echo json_encode(['success'=>true,'message'=>'Status updated']);
}else{
    echo json_encode(['success'=>false,'message'=>'Database error']);
}
$stmt->close();
