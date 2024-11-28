<?php
require_once 'database.php';
global $conn;
try {
    // Sử dụng đường dẫn tuyệt đối đến file CSV
    $csvFile = dirname(__FILE__) . '/../../KTPM3_Danh_sach_diem_danh.csv';

    // Kiểm tra file tồn tại
    if (!file_exists($csvFile)) {
        throw new Exception("File CSV không tồn tại tại đường dẫn: " . $csvFile);
    }

    // Mở file CSV
    $file = fopen($csvFile, 'r');

    // Bỏ qua dòng tiêu đề
    fgetcsv($file);

    // Chuẩn bị câu lệnh SQL
    $sql = "INSERT INTO users (username, password, lastname, firstname, city, email, course1) 
            VALUES (:username, :password, :lastname, :firstname, :city, :email, :course1)";
    $stmt = $conn->prepare($sql);

    // Đọc từng dòng trong file CSV
    while (($data = fgetcsv($file)) !== FALSE) {
        // Kiểm tra dòng có đủ dữ liệu không
        if (count($data) >= 7 && !empty($data[0])) {
            try {
                $stmt->execute([
                    ':username' => $data[0],
                    ':password' => $data[1],
                    ':lastname' => $data[2],
                    ':firstname' => $data[3],
                    ':city' => $data[4],
                    ':email' => $data[5],
                    ':course1' => $data[6]
                ]);
//                echo "Đã thêm thành công user: " . $data[0] . "<br>";
            } catch (PDOException $e) {
                echo "Lỗi khi thêm user {$data[0]}: " . $e->getMessage() . "<br>";
            }
        }
    }

    fclose($file);
//    echo "Hoàn thành việc import dữ liệu!";

} catch (Exception $e) {
//    echo "Có lỗi xảy ra: " . $e->getMessage();
}
?>