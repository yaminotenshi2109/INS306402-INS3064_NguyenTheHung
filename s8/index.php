<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý trường học</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        h1 { color: #333; }
        .menu { display: flex; gap: 20px; margin-top: 20px; }
        .menu a { 
            text-decoration: none; 
            padding: 15px 25px; 
            background: #007bff; 
            color: white; 
            border-radius: 5px; 
            font-weight: bold;
        }
        .menu a:hover { background: #0056b3; }
    </style>
</head>
<body>

    <h1>Hệ thống Quản lý Sinh viên & Khóa học</h1>
    <p>Chào mừng bạn đến với hệ thống quản lý. Vui lòng chọn module bên dưới để tiếp tục:</p>

    <div class="menu">
        <a href="students/index.php">👨‍🎓 Quản lý Sinh viên</a>
        <a href="courses/index.php">📚 Quản lý Khóa học</a>
        <a href="enrollments/index.php">📝 Quản lý Đăng ký học</a>
    </div>

</body>
</html>