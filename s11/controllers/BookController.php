<?php
// controllers/BookController.php

require_once __DIR__ . '/../models/BookModel.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new BookModel();
    }

    // --- READ ---
    public function index() {
        $books = $this->bookModel->getAll();
        require __DIR__ . '/../views/books/index.php';
    }

    // --- CREATE ---
    public function create() {
        require __DIR__ . '/../views/books/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'isbn' => trim($_POST['isbn'] ?? ''),
                'title' => trim($_POST['title'] ?? ''),
                'author' => trim($_POST['author'] ?? ''),
                'publisher' => trim($_POST['publisher']) !== '' ? trim($_POST['publisher']) : null,
                'publication_year' => !empty($_POST['publication_year']) ? (int)$_POST['publication_year'] : null,
                'available_copies' => (int)($_POST['available_copies'] ?? 0)
            ];

            if (empty($data['isbn']) || empty($data['title']) || empty($data['author']) || $data['available_copies'] < 0) {
                $error = "Vui lòng nhập đủ ISBN, Tên sách, Tác giả và Số lượng (>= 0).";
                require __DIR__ . '/../views/books/create.php'; 
                return;
            }

            $this->bookModel->create($data);
            header("Location: index.php?action=index"); 
            exit;
        }
    }

    // --- UPDATE ---
    public function edit() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $editBook = $this->bookModel->getById($id);

        if (!$editBook) {
            die("Không tìm thấy sách!");
        }

        require __DIR__ . '/../views/books/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (int)$_POST['id'];
            $data = [
                'isbn' => trim($_POST['isbn'] ?? ''),
                'title' => trim($_POST['title'] ?? ''),
                'author' => trim($_POST['author'] ?? ''),
                'publisher' => trim($_POST['publisher']) !== '' ? trim($_POST['publisher']) : null,
                'publication_year' => !empty($_POST['publication_year']) ? (int)$_POST['publication_year'] : null,
                'available_copies' => (int)($_POST['available_copies'] ?? 0)
            ];

            if (empty($data['isbn']) || empty($data['title']) || empty($data['author']) || $data['available_copies'] < 0) {
                $error = "Vui lòng nhập đủ ISBN, Tên sách, Tác giả và Số lượng (>= 0).";
                $editBook = $data; 
                $editBook['id'] = $id; 
                require __DIR__ . '/../views/books/edit.php';
                return;
            }

            $this->bookModel->update($id, $data);
            header("Location: index.php?action=index");
            exit;
        }
    }

    // --- DELETE ---
    public function delete() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $this->bookModel->delete($id);
        }
        header("Location: index.php?action=index");
        exit;
    }
}