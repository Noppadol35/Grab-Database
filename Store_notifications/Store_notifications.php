<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$res_email = $_GET['res_email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/Grab_logo/Grab_logo_resize.png">
    <title>GrabFood</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="restaurantpagess.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--- js ---->

</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <nav>
                <ul class="menu">
                    <li class="logo">
                        <a href="#"><img src="img/logo-grabb.png"></a>
                    </li>
                    <li><a class="item button second" href="/project_DATABASE/restaurantpage.php">
                            <i class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;กลับไปหน้าร้านค้า</a> </li>
                    <li><a class="item button third" href="/logout.php"><i
                                class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</a></li>
                    <li class="toggle"><a href="#"><i class="fa-solid fa-bars"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--- ------------------------------------------------ ---->

    <?php
    $sql = "SELECT * FROM food_order WHERE order_status != '0'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);



    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $order_ID = $row['order_ID'];
            $order_product = $row['order_product'];
            $order_price = $row['order_price'];
            $order_status = $row['order_status'];
            $order_date = $row['order_date'];
            $res_email = $row['res_email'];
            $cus_email = $row['cus_email'];
            $pay_type = $row['pay_type'];


            ?>

            <div class="slider_main">
                <div class="container1">
                    <img class="shopicon" src="img/store.png " alt="shop">

                    <div class="order-form">
                        <div class="item1">
                            <div class="content">

                                &nbsp;&nbsp;&nbsp;&nbsp;<h3>สรุปคำสั่งซื้อ</h3>
                                &nbsp;&nbsp;&nbsp;&nbsp;<p class="a-font">แสดงคำสั่งซื้ออาหารที่ร้านอาหาร</p>
                                <br>
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<strong>ลูกค้า :
                                    <?php echo $cus_email ?> <a>
                                </strong>

                                <br>
                                <br>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------------------</p>
                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;รายการอาหาร</strong><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo $order_product ?>
                                <br>
                                <br>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------------------</p>
                                <strong>&nbsp;&nbsp;&nbsp;&nbsp;TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php echo number_format($order_price, 2, ".", ","); ?> ฿
                                </strong>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------------------</p>
                                <br>
                                <?php if ($order_status == 2) { ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
                                        src="/check-mark.png" alt="location" width="60" height="60">
                                    <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สำเร็จ</strong>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------------------</p>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <?php



        }
    } else { ?>

        <div class="slider_main">
            <div class="container1">
                <h1 style="text-align: center;">ไม่มีรายการสั่งซื้อ</h1>
            </div>

        </div>
        <?php
    }


    ?>
    < <!--- ------------------------------------------------ ---->


        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

        <script>
            function Finish(order_ID) {
                var order_ID = order_ID;

                console.log(order_ID);
                console.log(rider_email);

                $.ajax({
                    type: 'POST',
                    url: 'cook.php',
                    data: {
                        order_ID: order_ID,
                    },

                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function () {
                            window.location.href = '/RIDER_ORDER/index.php?rider_email=' + rider_email + '';
                        }, 1000);

                    }
                });




            }
        </script>
</body>

<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="dist/js/app-style-switcher.js"></script>
<script src="dist/js/feather.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="assets/extra-libs/c3/d3.min.js"></script>
<script src="assets/extra-libs/c3/c3.min.js"></script>
<script src="assets/libs/chartist/dist/chartist.min.js"></script>
<script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="dist/js/pages/dashboards/dashboard1.min.js"></script>



</html>