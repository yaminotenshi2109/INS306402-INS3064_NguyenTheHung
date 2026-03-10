-- B1: Library System - Design Under Uncertainty
-- Schema for Books, Members, and Borrow Records using correct data types.

CREATE DATABASE IF NOT EXISTS library_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE library_db;

-- Books table
-- ISBN-13 stored as VARCHAR to preserve leading zeros and hyphens (e.g. 978-3-16-148410-0)
CREATE TABLE IF NOT EXISTS books (
    id            INT          NOT NULL AUTO_INCREMENT,
    isbn          VARCHAR(17)  NOT NULL UNIQUE,   -- ISBN-13 with hyphens: xxx-x-xx-xxxxxx-x
    title         VARCHAR(255) NOT NULL,
    author        VARCHAR(255) NOT NULL,
    publisher     VARCHAR(255),
    published_year YEAR,
    genre         VARCHAR(100),
    copies_total  INT          NOT NULL DEFAULT 1,
    copies_available INT       NOT NULL DEFAULT 1,
    PRIMARY KEY (id),
    CONSTRAINT chk_copies_total     CHECK (copies_total >= 0),
    CONSTRAINT chk_copies_available CHECK (copies_available >= 0)
);

-- Members table
-- Phone stored as VARCHAR to handle international formats and leading zeros (e.g. +84-091-234-5678)
CREATE TABLE IF NOT EXISTS members (
    id           INT          NOT NULL AUTO_INCREMENT,
    full_name    VARCHAR(150) NOT NULL,
    email        VARCHAR(255) NOT NULL UNIQUE,
    phone        VARCHAR(20),                     -- VARCHAR handles +country codes & leading zeros
    address      TEXT,
    membership_date DATE       NOT NULL DEFAULT (CURRENT_DATE),
    is_active    BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (id)
);

-- Borrow records table
-- References both books and members; tracks borrow_date, due_date, and optional return_date
CREATE TABLE IF NOT EXISTS borrow_records (
    id           INT  NOT NULL AUTO_INCREMENT,
    book_id      INT  NOT NULL,
    member_id    INT  NOT NULL,
    borrow_date  DATE NOT NULL DEFAULT (CURRENT_DATE),
    due_date     DATE NOT NULL,
    return_date  DATE DEFAULT NULL,               -- NULL means book not yet returned
    PRIMARY KEY (id),
    CONSTRAINT fk_borrow_book
        FOREIGN KEY (book_id)   REFERENCES books(id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_borrow_member
        FOREIGN KEY (member_id) REFERENCES members(id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT chk_due_after_borrow  CHECK (due_date > borrow_date),
    CONSTRAINT chk_return_after_borrow CHECK (return_date IS NULL OR return_date >= borrow_date)
);
