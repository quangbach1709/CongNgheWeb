<?php
//require '../views/products/LoadData.php';
require_once '../views/products/database.php';
global $conn;
//lay du lieu tu database


//tinh nang tim kiem
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $sql = "SELECT * FROM users WHERE username LIKE :search";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':search' => '%' . $search . '%'
    ]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    try {
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi khi truy vấn dữ liệu: " . $e->getMessage();
    }
}

include_once '../views/partials/header.php';
?>
<body>
<div class="container">

    <h3>Quan ly Sinh Vien</h3>
    <div class="d-flex justify-content-between">
        <a href="add.php" class="btn btn-primary">Them moi</a>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search" method="post">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search by UserName"
                           aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>

    <table class="table table-primary">
        <thead>
        <tr>
            <th scope="col">User Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Firth Name</th>
            <th scope="col">Lop</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?php echo $user['username'] ?></th>
                <td><?php echo $user['lastname'] ?></td>
                <td><?php echo $user['firstname'] ?></td>
                <td><?php echo $user['city'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <a href="edit.php?username=<?php echo $user['username'] ?>" class="btn btn-primary">Sua</a>
                    <a href="delete.php?username=<?php echo $user['username'] ?>" class="btn btn-danger">Xoa</a>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>
</div>
</body>
</html>
