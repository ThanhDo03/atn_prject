<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PetShop</title>
    <link rel="stylesheet" href="./Dog_Detail.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="Header">
        <a href="../Pet.php" class="a2"><img src="../vv/Logo Small.png" alt=""></a>
    </div>
    <div id="Detail">
        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'demo');
        if (!$connect) {
            echo 'Not Connect';
        }
        $name = $_GET["name"];
        $sql = "SELECT * FROM product WHERE ProductName='$name'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $ProductName = $row['ProductName'];
        ?>
        <div class="Image">
            <img src="../Dog/<?php echo $row['Image'] ?>">
        </div>
        <div class="Infor">
            <h1>ID: <?php echo $row['ProductID'] ?></h1>
            <h2>Name Of Product: <?php echo $row['ProductName'] ?></h2>
            <p style="color:red;padding-left: 20px;font-size:20px;"> Price: <?php echo $row['Price']; ?></p>
            <p style="color:red;padding-left: 20px;font-size:20px;"> Amount: <?php echo $row['Amount']; ?></p>
            <h2>Basic product information:</h2>
            <p><?php echo $row['Des']; ?></p>
            <form method="POST">
                <button type="submit" name="btn1" class="btn1">HOSTLINE: 0344556315</button>
                <button type="submit" name="btn2" class="btn2">CHAT WITH PETSHOP</button>
            </form>
        </div>
        <?php
        }
        ?>
        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'demo');
        if (!$connect) {
            echo 'Not Connect';
        }
        if (isset($_POST['btn'])) {
            $sql = "INSERT INTO cart (NameProduct) VALUES ('$name')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                echo "<script> alert('ADD S')</script>";
            } else {
                echo "<script> alert('Fail')</script>";
            }
        }

        ?>
    </div>
    <footer>
        <div id="col1">
            <div class="child_col1">
                <ul>
                    <li><a href="">FINE A STORE</a></li>
                    <li><a href="">BECOME A MEMBER</a></li>
                    <li><a href="">SIGN UP FOR EMAIL</a></li>
                    <li><a href="">SEND US FEEDBACK</a></li>
                </ul>
            </div>
        </div>
        <div id="col2">
            <div class="child_col2">
                <ul>
                    <li><a href="">GET HELP</a></li>
                    <li><a href="" class="child_col2_ullia">Order Status</a></li>
                    <li><a href="" class="child_col2_ullia">Delivery</a></li>
                    <li><a href="" class="child_col2_ullia">Return</a></li>
                    <li><a href="" class="child_col2_ullia">Payment Options</a></li>
                    <li><a href="" class="child_col2_ullia">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div id="col3">
            <div class="child_col3">
                <ul>
                    <li><a href="">ABOUT PETSHOP</a></li>
                    <li><a href="" class="child_col2_ullia">News</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <div id="End">
        <p>Location: 39YE,Alley 44,Tran Thai Tong, Dich Vong Hau, Cau Giay, Ha Noi</p>
    </div>
    <div id="End2">
        <p>&copy; 2022 THANH DO COMPANY.Inc. All Rights Reserved</p>
    </div>
</body>

</html>