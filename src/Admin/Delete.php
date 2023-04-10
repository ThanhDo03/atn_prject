<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
$connect = include_once("config.php");
// $connect = mysqli_connect('localhost', 'root', '', 'toyskid_project');
// if (!$connect) {
//     # code...
//     echo 'Not Connect';
// }

// 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$id = $_GET['id'];
$sql = "DELETE FROM `products` WHERE id=$id;";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($connect, $sql);

// 4. Đóng kết nối
mysqli_close($connect);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:Management.php');
