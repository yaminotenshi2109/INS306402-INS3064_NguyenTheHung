<?php

// models/BookModel.php

require_once __DIR__ . '/../config/database.php';

class BookModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnection();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM books ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO books (isbn, title, author, publisher, publication_year, available_copies) 
                VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['isbn'],
            $data['title'],
            $data['author'],
            $data['publisher'],
            $data['publication_year'],
            $data['available_copies']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE books SET isbn = ?, title = ?, author = ?, publisher = ?, publication_year = ?, available_copies = ? 
                WHERE id = ?"
        );
        return $stmt->execute([
            $data['isbn'],
            $data['title'],
            $data['author'],
            $data['publisher'],
            $data['publication_year'],
            $data['available_copies'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
