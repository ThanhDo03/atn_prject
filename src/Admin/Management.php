<?php include 'includes/header.php'; ?>

<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">Hi, Admin</h2>
                    <p class="az-dashboard-text">Product Management.</p>
                </div>
            </div><!-- az-dashboard-one-title -->

            <div class="az-dashboard-nav">
                <nav class="nav">
                    <a class="nav-link active" data-toggle="tab" href="./Management.php"><i class="fa-sharp fa-solid fa-house"></i> Home </a>
                    <a class="nav-link" data-toggle="tab" href="./Upload_Product.php"><i class="fa-sharp fa-solid fa-download"></i> Upload Product </a>
                    <a class="nav-link" data-toggle="tab" href="#"> ...Category Product</a>
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
                    <!-- <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
                    <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
                    <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
                    <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a> -->
                </nav>
            </div>

            <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
                <div class="card card-table-one">
                    <h6 class="card-title">What did you create?</h6>
                    <p class="az-content-text mg-b-20">The products we create are the best and most perfect quality products!</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="wd-5p">###</th>
                                    <th class="wd-45p">Name</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $connect = include_once("config.php");
                                // $connect = mysqli_connect('localhost', 'root', '', 'toyskid_project');
                                // if (!$connect) {
                                //     echo 'Not Connect';
                                // }
                                $sql = 'SELECT * FROM products';
                                $result = mysqli_query($connect, $sql);
                                while ($row_product = mysqli_fetch_array($result)) {
                                    $id = $row_product['id'];
                                    $image = $row_product['Image'];
                                    $pro_name = $row_product['name'];
                                    $pro_price = $row_product['price'];
                                    $pro_amount = $row_product['amount'];
                                    echo "
                                        <tr>
                                            <td>
                                              <a href='Edit.php?id=$id' id='btnUpdate' class='btn btn-primary' style='border-radius: 5px'>
                                                <i class='fas fa-edit'></i>
                                              </a>

                                              <a href='Delete.php?id=$id' id='btnDelete' class='btn btn-danger' style='border-radius: 5px'>
                                                <i class='fas fa-trash-alt'></i>
                                              </a>
                                            </td>
                                            <td><strong>$pro_name</strong></td>
                                            <td><strong>$pro_price</strong></td>
                                            <td><h6>$pro_amount</h6></td>
                                            <td><img  style='width:100px;height:100px' src='./Products/$image'></td>
                                        </tr>
                                        ";
                                }
                                ?>
                            </tbody>
                        </table>
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
