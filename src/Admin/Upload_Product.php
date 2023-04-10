<?php include 'includes/header.php'; ?>

<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">Hi, Admin</h2>
                    <p class="az-dashboard-text">Add New Product.</p>
                </div>
            </div><!-- az-dashboard-one-title -->

            <div class="az-dashboard-nav">
                <nav class="nav">
                    <a class="nav-link active" data-toggle="tab" href="./Management.php"><i
                            class="fa-sharp fa-solid fa-house"></i> Home </a>
                    <a class="nav-link" data-toggle="tab" href="#"> ...Category </a>
                    <!-- <a class="nav-link" data-toggle="tab" href="#">More</a> -->
                </nav>

                <nav class="nav">
                    <?php
                        if(isset($_SESSION['Welcome']['useremail'])){
                            echo "
                                <a class='nav-link' href='#'><i class='fa-sharp fa-solid fa-user'></i> {$_SESSION['Welcome']['useremail']}</a>
                                
                            ";
                            echo "<a class='nav-link' href='../Logout.php'><i class='fa-sharp fa-solid fa-right-from-bracket'></i> Logout</a>";
                            echo "<a class='nav-link' href='#'><i class='fas fa-ellipsis-h'></i></a>";
                        }else{
                            echo "Admin cụa tao đâu";
                        }
                    ?>
                </nav>
            </div>

            <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
                <div class="card card-table-one">
                    <div class="table-responsive">
                        <div class="card card-table-one">
                            <form name="frmCreate" method="POST" action="" class="form" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <td>Product</td>
                                        <td>
                                            <input type="text" name="name" id="name"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>
                                            <textarea name="description" id="description" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>
                                            <input type="text" name="price" id="price"
                                                class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td><input type="text" name="amount" id="amount" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td><input type="file" name="image" id="image" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button name="btnSave" class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                                Save data</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <?php
                        include_once('config.php');
                        // $connect = mysqli_connect('localhost', 'root', '', 'toyskid_project');
                        // if (!$connect) {
                        //     # code...
                        //     echo 'Not Connect';
                        // }
                        
                        if (isset($_POST['btnSave'])) {
                            # code...
                            $name = $_POST['name'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $amount = $_POST['amount'];
                            // Chú ý nhận dữ liệu kiểu file từ Form
                            $image = $_FILES['image']['name'];
                            // Đưa ảnh từ máy tính lên tmp
                            $image_tmp = $_FILES['image']['tmp_name'];
                            // Di chuyển ảnh từ tmp sang thư mục cần lưu
                            move_uploaded_file($image_tmp, "Products/$image");
                            if ($name == ' ') {
                                echo "<script>alert('No')</script>";
                            } else {
                                $sql = "INSERT INTO products VALUES('','$name','$description','$price','$amount','$image')";
                                $result = mysqli_query($connect, $sql);
                                if ($result) {
                                    echo "<script>alert('Thêm sản phẩm thành công') </script>";
                                    // header('location: Management.php');
                                } else {
                                    echo "<script>alert('Thêm thất bại') </script>";
                                }
                            }
                        }
                        ?>
                    </div><!-- table-responsive -->
                </div><!-- card -->
            </div><!-- col-lg -->
        </div><!-- row -->
    </div><!-- az-content-body -->
</div>
</div><!-- az-content -->
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../lib/ionicons/ionicons.js"></script>
<script src="../lib/jquery.flot/jquery.flot.js"></script>
<script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="../lib/chart.js/Chart.bundle.min.js"></script>
<script src="../lib/peity/jquery.peity.min.js"></script>

<script src="../js/js_Management.js"></script>
<script>
    $(function() {
        'use strict'

        var plot = $.plot('#flotChart', [{
            data: flotSampleData3,
            color: '#007bff',
            lines: {
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.2
                    }]
                }
            }
        }, {
            data: flotSampleData4,
            color: '#560bd0',
            lines: {
                fillColor: {
                    colors: [{
                        opacity: 0
                    }, {
                        opacity: 0.2
                    }]
                }
            }
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 8
            },
            yaxis: {
                show: true,
                min: 0,
                max: 100,
                ticks: [
                    [0, ''],
                    [20, '20K'],
                    [40, '40K'],
                    [60, '60K'],
                    [80, '80K']
                ],
                tickColor: '#eee'
            },
            xaxis: {
                show: true,
                color: '#fff',
                ticks: [
                    [25, 'OCT 21'],
                    [75, 'OCT 22'],
                    [100, 'OCT 23'],
                    [125, 'OCT 24']
                ],
            }
        });

        $.plot('#flotChart1', [{
            data: dashData2,
            color: '#00cccc'
        }], {
            series: {
                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.2
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 50
            }
        });

        $.plot('#flotChart2', [{
            data: dashData2,
            color: '#007bff'
        }], {
            series: {
                shadowSize: 0,
                bars: {
                    show: true,
                    lineWidth: 0,
                    fill: 1,
                    barWidth: .5
                }
            },
            grid: {
                borderWidth: 0,
                labelMargin: 0
            },
            yaxis: {
                show: false,
                min: 0,
                max: 35
            },
            xaxis: {
                show: false,
                max: 20
            }
        });


        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7],
                datasets: [{
                    data: [2, 4, 10, 20, 45, 40, 35, 18],
                    backgroundColor: '#560bd0'
                }, {
                    data: [3, 6, 15, 35, 50, 45, 35, 25],
                    backgroundColor: '#cad0e8'
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    enabled: false
                },
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            max: 80
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        gridLines: {
                            color: 'rgba(0,0,0,0.08)'
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            display: false
                        }
                    }]
                }
            }
        });

        // Donut Chart
        var datapie = {
            labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
            datasets: [{
                data: [25, 20, 30, 15, 10],
                backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
            }]
        };

        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // For a doughnut chart
        var ctxpie = document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
            type: 'doughnut',
            data: datapie,
            options: optionpie
        });

    });
</script>
<?php include 'includes/footer.php'; ?>
