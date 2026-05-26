<?php
// config/database.php

function getConnection(): PDO {
    $host = 'localhost';
    $dbname = 'library_system';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error connecting Database: " . $e->getMessage());
    }
}