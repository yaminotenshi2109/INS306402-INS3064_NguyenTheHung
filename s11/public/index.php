<?php
// public/index.php

require_once __DIR__ . '/../controllers/BookController.php';

$controller = new BookController();

$action = $_GET['action'] ?? 'index';

$allowedActions = ['index', 'create', 'store', 'edit', 'update', 'delete'];

// (Router)
if (in_array($action, $allowedActions)) {
    $controller->$action();
} else {
    http_response_code(404);
    echo "<div style='text-align: center; margin-top: 50px; font-family: Arial;'>";
    echo "<h2>404 - Không tìm thấy trang!</h2>";
    echo "<a href='index.php' style='color: #3498db; text-decoration: none;'>Quay lại trang chủ</a>";
    echo "</div>";
}