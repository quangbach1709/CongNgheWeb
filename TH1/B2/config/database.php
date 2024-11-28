<?php
$host = 'localhost';
$dbname = 'quiz_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    
    $pdo->exec("USE `$dbname`");
    
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS questions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            question_text TEXT NOT NULL,
            correct_answer VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS options (
            id INT AUTO_INCREMENT PRIMARY KEY,
            question_id INT,
            option_key CHAR(1),
            option_text TEXT NOT NULL,
            FOREIGN KEY (question_id) REFERENCES questions(id)
        );
    ");
    
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
    die();
} 