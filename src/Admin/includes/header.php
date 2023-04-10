<?php
session_start();
include_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Toys Store Admin</title>

    <!--   -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/style_Management.css">
    <script src="https://kit.fontawesome.com/f52718c374.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span> Toys Store</a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="index.html" class="az-logo"><span></span> Toys Store</a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item">
                        <a href="./Management.php" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href="./Upload_Product.php" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"><i class="typcn typcn-book"></i></a>
                    </li>
                </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="../img/Logo_Copy.png" alt=""></a>
                    <!-- <?php
                        if (isset($_SESSION['Welcome']['useremail'])) {
                            # code...
                            echo "
                                <a href=''>{$_SESSION['Welcome']['useremail']}</a>
                            ";
                        }else{
                            echo "Admin của tao đâu";
                        }
                    ?> -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->