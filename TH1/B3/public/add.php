<?php
require_once '../views/products/database.php';
global $conn;
//them moi du lieu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $city = $_POST['city'];
    $email = $_POST['email'];

    try {
        $sql = "INSERT INTO users (username, password, lastname, firstname, city, email, course1) 
            VALUES (:username, :password, :lastname, :firstname, :city, :email, :course1)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':city' => $city,
            ':email' => $email,
            ':course1' => 'CSE485.202401'
        ]);
    } catch (PDOException $e) {
        echo "Lỗi khi thêm dữ liệu: " . $e->getMessage();
    }

    header('Location: index.php');
}
require_once '../views/partials/header.php';
?>
<body>
<div class="container">
    <h2>Thêm mới người dùng</h2>
    <?php
    include_once "../views/partials/form.php";
    ?>
    <a href="index.php">Back to home page</a>
</body>
</html>


