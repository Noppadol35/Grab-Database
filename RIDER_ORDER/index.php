<?php
session_start();

$rider_email = $_GET['rider_email'];


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';



$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM rider WHERE rider_email = '$rider_email'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");





?>


<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic --
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
      <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->


   <!-- <div class="loader_bg">
      <div class="loader"><img src="img/food-icons-loading-animation.gif" alt="#" /></div>
   </div> -->



   <!-- end loader -->
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
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                     aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.html">Order</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="profile.php?email=<?php echo $rider_email ?>">Profile</a>
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

   <?php 
      $sql_order = "SELECT * FROM food_order";
      $result_order = mysqli_query($conn, $sql_order);


      $count = mysqli_num_rows($result_order);
      if ($count > 0) {

         while ($objResult = mysqli_fetch_array($result_order)) {


            $order_ID = $objResult['order_ID'];
            $order_product = $objResult['order_product'];
            $order_price = $objResult['order_price'];
            $order_status = $objResult['order_status'];
            $order_date = $objResult['order_date'];
            $cus_email = $objResult['cus_email'];
            $res_email = $objResult['res_email'];
            $pay_type = $objResult['pay_type'];

            
   
            $sql_res = "SELECT * FROM restaurant WHERE res_email = '$res_email'";
            $result_res = mysqli_query($conn, $sql_res);

            $row_res = mysqli_fetch_array($result_res);

      
   ?>


   <div class="slider_main">
      <div class="container1">
         <div class="order-form">
            <form>
               <fieldset>
                     <img src="img/grabfood.png" alt="food" width="150" height="150"
                        style="display: block; margin: 0 auto;">
                  <div class="order-summary">
                     <img src="img/business_cash_coin_dollar_finance_money_payment_icon_123244.png" alt="price"
                        width="30" height="30">
                     <span class="order-price">ราคาของอาหารที่สั่ง <strong><?php echo number_format($order_price,2,".",","); ?></strong>฿</span>
                  </div>
                  <hr>
                  <p class="order-location">ห่างจากคุณ <?php echo(rand(1,30)); ?> กม.</p>
                  <div class="order-restaurant">
                     <h3><img src="img/location black.png" alt="location" width="20" height="20">
                        <?php echo $row_res['res_name'] ?></h3>
                     <p class="order-address"> <?php echo $row_res['res_address'] ?></p>
                     <br>
                     <?php $sql = "SELECT * FROM cus WHERE cus_email = '$cus_email'";
                        $resulttt = mysqli_query($conn, $sql);

                        $rowww = mysqli_fetch_array($resulttt);
                        ?>
                         <?php 
            if ($order_status == 0){ ?>

<h3><img src="img/location red.png" alt="location" width="20" height="20"><?php echo $rowww['cus_name'] ?></h3>

                        

                     <p class="order-address"> <?php echo $rowww['cus_address']?></p>

           <?php }
            else{?>
               
               <h3><img src="img/location red.png" alt="location" width="20" height="20"><?php echo $rowww['cus_name'] ?></h3>

                        

<p class="order-address"> <?php echo $rowww['cus_address']?></p>
<img src="/check-mark.png" alt="location" width="60" height="60">
               <?php
            }

?>
                     
                  </div>
               </fieldset>
            </form>
            <br>
            <?php 
            if ($order_status == 0){ ?>

<a href="food_delivered.php?rider_email=<?php echo $rider_email; ?>&order_ID=<?php echo $order_ID;?>" class="btn-1 btn-large"> รับงาน </a>

           <?php }
            else{?>
               
<button class="btn-1 btn-large"  disabled> เสร็จสิ้น </button>
               <?php
            }

?>
            <!-- <button class="btn-1"><a href="map.html">รับงาน</a></button> -->
         </div>
      </div>
   </div>

   <?php
         }
      } else { ?>
         <div class="slider_main">
      <div class="container1">
         <p>NO Order</p>
      </div>
   </div>

         <?php
      }
      ?>

   <!-- end banner -->
   <!-- domain -->

   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- sidebar -->
   <script src="js/custom.js"></script>
</body>

</html>