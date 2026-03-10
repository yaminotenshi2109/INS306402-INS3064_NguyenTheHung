-- A1: Student Ops - Build the Student Database
-- Create database with utf8mb4_unicode_ci collation

CREATE DATABASE IF NOT EXISTS student_management_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE student_management_db;

-- Create classes table
CREATE TABLE IF NOT EXISTS classes (
    id          INT          NOT NULL AUTO_INCREMENT,
    class_name  VARCHAR(100) NOT NULL,
    department  VARCHAR(100),
    PRIMARY KEY (id)
);

-- Create students table with foreign key referencing classes
CREATE TABLE IF NOT EXISTS students (
    id           INT          NOT NULL AUTO_INCREMENT,
    student_code VARCHAR(50)  NOT NULL UNIQUE,
    full_name    VARCHAR(150) NOT NULL,
    email        VARCHAR(255) NOT NULL UNIQUE,
    age          INT,
    class_id     INT,
    PRIMARY KEY (id),
    CONSTRAINT fk_students_class
        FOREIGN KEY (class_id) REFERENCES classes(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);
