<?php
//$host = 'localhost';
//$db = 'php';
//$user = 'root';
//$pass = '';

try {
    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
?>