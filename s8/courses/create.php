<?php
require_once __DIR__ . '/../classes/Database.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    // Validate: Title không rỗng và >= 3 ký tự
    if (empty($title)) {
        $error_message = "Tên khóa học không được để trống!";
    } elseif (mb_strlen($title) < 3) {
        $error_message = "Tên khóa học phải có ít nhất 3 ký tự!";
    } else {
        // Thêm vào database nếu hợp lệ
        $database = new Database();
        $db = $database->getConnection();
        
        $query = "INSERT INTO courses (title, description) VALUES (:title, :description)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        
        if($stmt->execute()) {
            header("Location: index.php"); // Quay lại trang danh sách
            exit();
        } else {
            $error_message = "Có lỗi xảy ra khi lưu dữ liệu.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Khóa học</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold;}
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        .error { color: red; margin-bottom: 15px; font-weight: bold; }
        .btn { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Thêm Khóa học mới</h2>
    <p><a href="index.php">⬅ Quay lại danh sách</a></p>

    <?php if(!empty($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="max-width: 500px;">
        <div class="form-group">
            <label>Tên khóa học (*)</label>
            <input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" rows="5"><?php echo isset($description) ? $description : ''; ?></textarea>
        </div>
        <button type="submit" class="btn">Lưu Khóa học</button>
    </form>
</body>
</html>