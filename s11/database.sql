CREATE DATABASE IF NOT EXISTS library_system;
USE library_system;

-- 1. TABLE(books)
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) UNIQUE NOT NULL,
    title VARCHAR(150) NOT NULL,
    author VARCHAR(100) NOT NULL,
    publisher VARCHAR(100),
    publication_year INT,
    available_copies INT NOT NULL
);

-- 2. TABLE (borrow_transactions)
CREATE TABLE borrow_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    borrower_name VARCHAR(100) NOT NULL,
    borrow_date DATE NOT NULL,
    due_date DATE NOT NULL,
    return_date DATE NULL,
    status ENUM('Borrowed', 'Returned', 'Overdue') NOT NULL,
    -- FK connected to books_id column in books table
    FOREIGN KEY (book_id) REFERENCES books(id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE
);

INSERT INTO books (isbn, title, author, publisher, publication_year, available_copies) VALUES
('978-0132350884', 'Clean Code', 'Robert C. Martin', 'Prentice Hall', 2008, 3),
('978-0201616224', 'The Pragmatic Programmer', 'Andrew Hunt', 'Addison-Wesley', 1999, 5),
('978-1491918661', 'Learning PHP, MySQL & JavaScript', 'Robin Nixon', 'O''Reilly', 2018, 2),
('978-0262033848', 'Introduction to Algorithms', 'Thomas H. Cormen', 'MIT Press', 2009, 1),
('978-0131103627', 'The C Programming Language', 'Brian W. Kernighan', 'Prentice Hall', 1988, 4);

INSERT INTO borrow_transactions (book_id, borrower_name, borrow_date, due_date, return_date, status) VALUES
(1, 'Nguyen Van A', '2026-03-15', '2026-03-29', NULL, 'Overdue'),     -- Đã quá hạn
(2, 'Le Thi B', '2026-03-28', '2026-04-11', NULL, 'Borrowed'),      -- Đang mượn
(3, 'Tran Van C', '2026-03-10', '2026-03-24', '2026-03-22', 'Returned'), -- Đã trả đúng hạn
(1, 'Pham Thi D', '2026-03-29', '2026-04-12', NULL, 'Borrowed'),      -- Đang mượn
(5, 'Hoang Van E', '2026-03-01', '2026-03-15', '2026-03-14', 'Returned'); -- Đã trả đúng hạn