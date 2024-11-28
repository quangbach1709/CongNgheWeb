<?php

require_once '../views/products/database.php';
global $conn;

//xoa du lieu
$username = $_GET['username'];
$sql = "DELETE FROM users WHERE username = :username";
$statement = $conn->prepare($sql);
$statement->bindParam(':username', $username);
$statement->execute();

header('Location: index.php');

?>
