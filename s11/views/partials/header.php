<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Book Management</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #2c3e50; }
        .message { padding: 10px; margin-bottom: 20px; background: #f8d7da; color: #721c24; border-radius: 4px; text-align: center; } /* Đã đổi màu sang đỏ để báo lỗi */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; } 
        .form-group { margin-bottom: 10px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn-group { margin-top: 15px; text-align: right; }
        .btn { padding: 10px 15px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; display: inline-block;}
        .btn:hover { background: #2980b9; }
        .btn-danger { background: #e74c3c; }
        .btn-danger:hover { background: #c0392b; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background: #34495e; color: white; }
        .table-responsive { overflow-x: auto; }
        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📚 Book Management System</h2>