<?php
require_once '../views/products/database.php';
global $conn;

//su dung id de lay du lieu
$username = $_GET['username'];
$sql = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($sql);
$statement->bindParam(':username', $username);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $course1 = $_POST['course1'];

    try {
        $sql = "UPDATE users SET username = :username, password = :password, lastname = :lastname, firstname = :firstname, city = :city, email = :email, course1 = :course1 WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':city' => $city,
            ':email' => $email,
            ':course1' => $course1
        ]);
    } catch (PDOException $e) {
        echo "Lỗi khi sửa dữ liệu: " . $e->getMessage();
    }

    header('Location: index.php');
}

include_once "../views/partials/header.php";
?>
<body>
<div class="container">
    <h2>Sửa người dùng</h2>
    <?php
    include_once "../views/partials/form.php";
    ?>
    <a href="index.php">Back to home page</a>
</div>
</body>
