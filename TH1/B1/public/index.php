<?php
//lay data tu database
try {
    require_once '../views/database.php';
    global $conn;
//    $conn = new PDO('mysql:host=localhost;port=3307;dbname=php', 'root', '');
////thiet lap
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //lay tat ca gia tri tu bang flowers ra arr
    $sql = "SELECT * FROM flowers";
    $statement = $conn->prepare($sql);
    $statement->execute();

    $flowers = $statement->fetchAll();

} catch (PDOException $e) {
    die("Connect failed" . $e->getMessage());
}

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
        <h3>14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h3>

        <div class="m-5">
            <h5>
                Mỗi loại hoa sẽ khoe sắc rực rỡ vào đúng thời điểm thích hợp trong năm, khí hậu đáp ứng thuận lợi sẽ giúp
                hoa phát triển nhanh và đẹp một cách hoàn hảo. Nếu đang có kế hoạch trồng hoa trong dịp xuân - hè thì
                bạn hãy tham khảo bài viết dưới đây nhé!
            </h5>

            <?php foreach ($flowers as $key => $flower) { ?>
                <div class="mt-5">
                    <h4><?php echo $flower['id'] . ": " . $flower['name'] ?></h4>
<!--                    <img src="../views/images/doquyen.jpg" alt="">-->
                    <img src="<?php echo $flower['img'] ?>" alt="">
                    <p><?php echo $flower['description'] ?></p>
                </div>

            <?php } ?>


        </div>
    </div>
</main>
</body>
</html>
