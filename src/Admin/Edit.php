<?php include 'includes/header.php'; ?>
<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">Hi, welcome back!</h2>
                    <p class="az-dashboard-text">Product Update Form.</p>
                </div>
            </div><!-- az-dashboard-one-title -->

            <div class="az-dashboard-nav">
                <nav class="nav">
                    <a class="nav-link active" data-toggle="tab" href="./Management.php"><i
                            class="fa-sharp fa-solid fa-house"></i> Home </a>
                    <a class="nav-link" data-toggle="tab" href="./Upload_Product.php"><i class="fa-sharp fa-solid fa-download"></i> Upload Product </a>
                    <a class="nav-link" data-toggle="tab" href="#">More</a>
                </nav>

                <nav class="nav">
                    <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
                    <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
                    <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
                    <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                </nav>
            </div>
            <?php
            // Truy vấn database
            // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
            include_once('config.php');
            // $connect = mysqli_connect('localhost', 'root', '', 'toyskid_project');
            // if (!$connect) {
            //     # code...
            //     echo 'Not Connect';
            // }
            
            // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
            // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
            // $id = $_GET['id'];
            $id = $_GET['id'];
            $sqlSelect = "SELECT * FROM `products` WHERE id=$id;";
            
            // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
            $resultSelect = mysqli_query($connect, $sqlSelect);
            $shop_suppliersRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
            
            // Nếu không tìm thấy dữ liệu -> thông báo lỗi
            if (empty($shop_suppliersRow)) {
                echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
                die();
            }
            ?>

            <!-- Main content -->
            <div class="card card-table-one">
                <form name="frmEdit" id="frmEdit" method="post" action="" class="form">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id" id="id" class="form-control"
                                    value="<?php echo $shop_suppliersRow['id']; ?>" readonly /></td>
                        </tr>
                        <tr>
                            <td>Product</td>
                            <td><input type="text" name="name" id="name" class="form-control"
                                    value="<?php echo $shop_suppliersRow['name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea name="description" id="description" class="form-control" value=""><?php echo $shop_suppliersRow['description']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><input type="text" name="price" id="price" class="form-control"
                                    value="<?php echo $shop_suppliersRow['price']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td><input type="text" name="amount" id="amount" class="form-control"
                                    value="<?php echo $shop_suppliersRow['amount']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="text" name="image" id="image" class="form-control"
                                    value="<?php echo $shop_suppliersRow['Image']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Save data </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>


            <?php
            // 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
            if (isset($_POST['btnSave'])) {
                // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $amount = $_POST['amount'];
                $image = $_POST['image'];
                // $updated_at = date('Y-m-d H:i:s'); // Lấy ngày giờ hiện tại theo định dạng `Năm-Tháng-Ngày Giờ-Phút-Giây`. Vd: 2020-02-18 09:12:12
            
                // Câu lệnh UPDATE
                $sql = "UPDATE products SET name='$name', description='$description', price='$price', amount='$amount', Image='$image' WHERE id=$id;";
            
                // Thực thi UPDATE
                mysqli_query($connect, $sql);
            
                // Đóng kết nối
                mysqli_close($connect);
            
            }
            ?>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
