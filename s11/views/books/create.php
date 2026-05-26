<?php require __DIR__ . '/../partials/header.php'; ?>

    <div style="background: #f9f9f9; padding: 20px; border-radius: 5px; border: 1px solid #eee;">
        <h3 style="margin-top:0;">➕ Thêm Sách Mới</h3>

        <?php if (!empty($error)): ?>
            <div class="message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=store">
            <div class="form-grid">
                <div class="form-group">
                    <label>Mã ISBN *:</label>
                    <input type="text" name="isbn" value="<?php echo htmlspecialchars($data['isbn'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Tên sách *:</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($data['title'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Tác giả *:</label>
                    <input type="text" name="author" value="<?php echo htmlspecialchars($data['author'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label>Nhà xuất bản:</label>
                    <input type="text" name="publisher" value="<?php echo htmlspecialchars($data['publisher'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Năm xuất bản:</label>
                    <input type="number" name="publication_year" value="<?php echo htmlspecialchars($data['publication_year'] ?? ''); ?>" min="1000" max="2100">
                </div>
                <div class="form-group">
                    <label>Số lượng có sẵn *:</label>
                    <input type="number" name="available_copies" value="<?php echo htmlspecialchars($data['available_copies'] ?? '1'); ?>" required min="0">
                </div>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn">Thêm Sách</button>
                <a href="index.php?action=index" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>