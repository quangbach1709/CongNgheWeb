<?php
$flowers = [
    [
        'id' => 1,
        'name' => 'Do Quyen',
        'image' => '../views/images/doquyen.jpg',
        'description' => 'Do Quyen la loai hoa dep nhat'
    ],
    [
        'id' => 2,
        'name' => 'Hai Duong',
        'image' => '../views/images/haiduong.jpg',
        'description' => 'Hai Duong la loai hoa dep nhat'
    ],
    [
        'id' => 3,
        'name' => 'Hoa Mai',
        'image' => '../views/images/mai.jpg',
        'description' => 'Hoa Mai la loai hoa dep nhat'
    ],
    [
        'id' => 4,
        'name' => 'Hoa Tuong Vy',
        'image' => '../views/images/tuongvy.jpg',
        'description' => 'Hoa Tuong Vy la loai hoa dep nhat'
    ]
]

?>
<?php
include_once "../views/partials/header.php";
?>
<body>
<?php
include_once "../views/partials/nav.php";
?>
<main>
    <div class="container">
        <h2>Admin</h2>
        <div>
            <a href="add.php" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="row">
            <div class="col">
                Hinh anh
            </div>
            <div class="col">
                Sản phẩm
            </div>
            <div class="col">
                Mô tả
            </div>
            <div class="col">
                Sửa
            </div>
            <div class="col">
                Xóa
            </div>
        </div>
        <?php foreach ($flowers as $key => $flower) { ?>
            <div class="row ">
                <div class="col">
                    <img src="<?php echo $flower['image'] ?>" alt="" class="w-75 h-75">
                </div>
                <div class="col">
                    <?php echo $flower['name'] ?>
                </div>
                <div class="col">
                    <?php echo $flower['description'] ?>
                </div>
                <div class="col">
                    <a href="edit.php?id=<?php echo $flower['id'] ?>" class="btn btn-primary">Sửa</a>
                </div>
                <div class="col">
                    <a href="delete.php?id=<?php echo $flower['id'] ?>" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

</body>
</html>
