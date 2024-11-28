<?php
$conn = new PDO('mysql:host=localhost;port=3307;dbname=php', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>