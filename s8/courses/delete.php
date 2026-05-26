<?php
require_once __DIR__ . '/../classes/Database.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "DELETE FROM courses WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $_GET['id']);
    
    $stmt->execute();
}

// Xóa xong tự động chuyển hướng về trang danh sách
header("Location: index.php");
exit();
?>