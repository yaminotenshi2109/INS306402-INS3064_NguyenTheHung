<?php
require_once __DIR__ . '/../classes/Database.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT id, title, description, created_at FROM courses ORDER BY id DESC";
$stmt = $db->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Khóa học</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 4px; color: white; display: inline-block;}
        .btn-primary { background-color: #007bff; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; }
        .header-actions { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <p><a href="../index.php">⬅ Quay lại Trang chủ</a></p>
    <div class="header-actions">
        <h1>Danh sách Khóa học</h1>
        <a href="create.php" class="btn btn-primary">+ Thêm khóa học</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khóa học (Title)</th>
                <th>Mô tả (Description)</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $formatted_date = date("d/m/Y", strtotime($created_at));
                    echo "<tr>
                            <td>{$id}</td>
                            <td><strong>{$title}</strong></td>
                            <td>{$description}</td>
                            <td>{$formatted_date}</td>
                            <td>
                                <a href='edit.php?id={$id}' class='btn btn-warning'>Sửa</a>
                                <a href='delete.php?id={$id}' class='btn btn-danger' onclick='return confirm(\"Xóa khóa học này?\")'>Xóa</a>
                            </td>
                            </tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>Chưa có khóa học nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>