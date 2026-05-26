<?php require __DIR__ . '/../partials/header.php'; ?>

    <div style="background: #f9f9f9; padding: 20px; border-radius: 5px; border: 1px solid #eee;">
        <h3 style="margin-top:0;">✏️ Sửa thông tin Sách</h3>

        <?php if (!empty($error)): ?>
            <div class="message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=update">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($editBook['id'] ?? ''); ?>">
            
            <div class="form-grid">
                <div class="form-group">
                    <label>Mã ISBN *:</label>
                    <input type="text" name="isbn" value="<?php echo htmlspecialchars($editBook['isbn'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Tên sách *:</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($editBook['title'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Tác giả *:</label>
                    <input type="text" name="author" value="<?php echo htmlspecialchars($editBook['author'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Nhà xuất bản:</label>
                    <input type="text" name="publisher" value="<?php echo htmlspecialchars($editBook['publisher'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Năm xuất bản:</label>
                    <input type="number" name="publication_year" value="<?php echo htmlspecialchars($editBook['publication_year'] ?? ''); ?>" min="1000" max="2100">
                </div>
                <div class="form-group">
                    <label>Số lượng có sẵn *:</label>
                    <input type="number" name="available_copies" value="<?php echo htmlspecialchars($editBook['available_copies'] ?? '1'); ?>" required min="0">
                </div>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn">Lưu Thay Đổi</button>
                <a href="index.php?action=index" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>