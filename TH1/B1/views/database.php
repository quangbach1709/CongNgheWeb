<?php
//ket noi voi database
$conn = new PDO('mysql:host=localhost;dbname=php', 'root', '');
//thiet lap
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
