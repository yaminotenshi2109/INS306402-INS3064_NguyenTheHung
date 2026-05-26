<?php
require_once __DIR__ . '/../classes/Database.php';

$database = new Database();
$db = $database->getConnection();
$error_message = '';

// Lấy ID từ URL
$id = isset($_GET['id']) ? $_GET['id'] : die('Lỗi: Không tìm thấy ID khóa học.');

// Khi người dùng submit form sửa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (empty($title)) {
        $error_message = "Tên khóa học không được để trống!";
    } elseif (mb_strlen($title) < 3) {
        $error_message = "Tên khóa học phải có ít nhất 3 ký tự!";
    } else {
        $query = "UPDATE courses SET title = :title, description = :description WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id);
        
        if($stmt->execute()) {
            header("Location: index.php");
            exit();
        }
    }
} else {
    // Nếu không phải POST, lấy dữ liệu hiện tại để hiển thị ra form
    $query = "SELECT title, description FROM courses WHERE id = :id LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row) {
        $title = $row['title'];
        $description = $row['description'];
    } else {
        die("Không tìm thấy khóa học này.");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Khóa học</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold;}
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; margin-bottom: 15px; font-weight: bold; }
        .btn { padding: 10px 15px; background: #ffc107; border: none; cursor: pointer; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Cập nhật Khóa học</h2>
    <p><a href="index.php">⬅ Quay lại danh sách</a></p>

    <?php if(!empty($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="edit.php?id=<?php echo $id; ?>" method="POST" style="max-width: 500px;">
        <div class="form-group">
            <label>Tên khóa học (*)</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" rows="5"><?php echo htmlspecialchars($description); ?></textarea>
        </div>
        <button type="submit" class="btn">Cập nhật</button>
    </form>
</body>
</html>