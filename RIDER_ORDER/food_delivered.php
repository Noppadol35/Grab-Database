<?php

$order_ID = $_GET['order_ID'];
$rider_email = $_GET['rider_email'];
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';



$conn = mysqli_connect($servername, $username, $password, $dbname);








$sql = "SELECT * FROM rider WHERE rider_email = '$rider_email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);




// $sql = "SELECT * FROM food_order WHERE order_ID = '$order_ID'";
// $result = mysqli_query($conn, $sql);





$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");


$sql_order = "SELECT * FROM food_order WHERE order_ID = '$order_ID'";
$result_order = mysqli_query($conn, $sql_order);

$row_order = mysqli_fetch_array($result_order);



$order_ID = $row_order['order_ID'];
$order_product = $row_order['order_product'];
$order_price = $row_order['order_price'];
$order_status = 1;
$order_date = $row_order['order_date'];
$res_email = $row_order['res_email'];
$cus_email = $row_order['cus_email'];
$pay_type = $row_order['pay_type'];

$stmt = $conn->prepare("UPDATE food_order SET order_status=? WHERE order_ID=?");
$stmt->bind_param("ss", $order_status, $order_ID);
$stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="sweetalert2.min.js"></script>
   <link rel="stylesheet" href="sweetalert2.min.css">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Grab Driver</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="img/grabfood.png" type="image" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<!-- body -->

<body class="main-layout">

   <!-- header -->
   <div class="header">
      <div class="container">
         <div class="row d_flex">
            <div class=" col-md-2 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo1">
                        <a href="index.html"><img src="img/logo-grabb.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Order</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                           <div class="btn-box">
                              <a class="btn1">
                                 <i class="fa fa-user"></i> <?php echo $row['rider_name']; ?>
                              </a>
                           </div>
                        </li>
                        <div class="btn-box">
                           <a href="/Grab_login.php" class="btn2">
                              <i class="fa-solid fa-right-from-bracket"></i>LOG OUT
                           </a>
                        </div>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- end header inner -->
   <!-- top -->
   <div class="slider_main">
      <div class="container2">
         <div class="order-form">
            <form>
               <fieldset>
                  <img src="img/grabfood.png" alt="food" width="150" height="150" style="display: block; margin: 0 auto;">
                  <div>
                     <?php
                     $sql_res = "SELECT * FROM restaurant WHERE res_email = '$res_email'";
                     $result_res = mysqli_query($conn, $sql_res);

                     $row_res = mysqli_fetch_array($result_res);
                     ?>
                     <h3>กำลังไปส่ง...</h3>

                     <br>

                     <strong><a>ร้านค้า</a></a></strong>
                     <h3><img src="img/location black.png" alt="location" width="20" height="20">
                        <?php echo $row_res['res_name'] ?> - <?php echo $row_res['res_address'] ?></h3>

                     <?php $sql = "SELECT * FROM cus WHERE cus_email = '$cus_email'";
                     $resulttt = mysqli_query($conn, $sql);

                     $rowww = mysqli_fetch_array($resulttt);
                     ?>

                     <strong><a>ลูกค้า</a></strong>
                     <h3> <img src="img/user.png" alt="Cus" width="30" height="30"><?php echo $rowww['cus_name'] ?> - <?php echo $rowww['cus_address'] ?></h3>
                     <br>

                     <strong><a>รายการคำสั่งซื้อของลูกค้า</a></strong>
                     <br>

                     <strong><?php echo $order_product ?></strong>
                     <br>
                     <a>----------------------------------------</a>
                     <h3>รวมทั้งหมด&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php echo number_format($order_price, 2, ".", ","); ?> ฿ </h3>
                     <a>----------------------------------------</a>

                  </div>
               </fieldset>
            </form>
            <br>
            <a href="#" onclick="Finish('<?php echo $order_ID ?>','<?php echo $rider_email ?>')" class="btn-1 btn-large"> จัดส่งอาหารแล้ว </a>
         </div>
      </div>
   </div>
   <!-- end banner -->
   <!-- domain -->

   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- sidebar -->
   <script src="js/custom.js"></script>


   <script>
      function Finish(order_ID, rider_email) {
         var order_ID = order_ID;
         var rider_email = rider_email;
         console.log(order_ID);
         console.log(rider_email);

         $.ajax({
            type: 'POST',
            url: 'finish.php',
            data: {
               order_ID: order_ID,
               rider_email: rider_email
            },
            
            success: function(data) {
               Swal.fire({
                  icon: 'success',
                  title: 'สำเร็จ',
                  showConfirmButton: false,
                  timer: 1500
               });
              
               setTimeout(function() {
					window.location.href = '/RIDER_ORDER/index.php?rider_email=' + rider_email + '';
		}, 1000);
              
            }
         });

      
         

      }
   </script>
   <script src="sweetalert2.min.js"></script>
   <link rel="stylesheet" href="sweetalert2.min.css">
</body>

</html>