<?php require __DIR__ . '/../partials/header.php'; ?>

    <div style="margin-bottom: 15px; text-align: right;">
        <a href="index.php?action=create" class="btn">➕ Thêm Sách Mới</a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th>NXB</th>
                    <th>Năm XB</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['publisher'] ?? '-'); ?></td>
                    <td><?php echo htmlspecialchars($book['publication_year'] ?? '-'); ?></td>
                    <td><?php echo $book['available_copies']; ?></td>
                    <td style="white-space: nowrap;">
                        <a href="index.php?action=edit&id=<?php echo $book['id']; ?>" class="btn" style="padding: 5px 10px;">Sửa</a>
                        <a href="index.php?action=delete&id=<?php echo $book['id']; ?>" class="btn btn-danger" style="padding: 5px 10px;" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div> </body>
</html>