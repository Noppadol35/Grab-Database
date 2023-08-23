<!DOCTYPE html>
<html>

<!--- js ---->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<!-- databoot -->
<?php

session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab'; ///////////////////////////////

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");
// SQL query to retrieve data from a table
$sql = "SELECT * FROM restaurant"; /////////////////////////////

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);


?>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/icon/icon-bar-1.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Grab Food Kmutnb</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />

</head>

<body>

  <!---------------------------------------------------------- header section --------------------------------------------------->
  <div class="header_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">

        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo-grab-1.png" alt="">
          </a>


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="#index.php">Home<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#section_shop">Shop</a>
              </li>
            

              <div class="btn-box">
                
               
                  <?php

                      if (!isset($_SESSION['user_name'])) {
                        $cus_email = "Guest";
                      }
                      else{
                      $cus_email = $_SESSION['user_name'];

                      $selectt = " SELECT * FROM cus WHERE cus_email = '$cus_email' ";

                      $resultt = mysqli_query($conn, $selectt);
                      $row = mysqli_fetch_array($resultt);
                      }
                  
                      
                      if(!isset($_SESSION['user_name'])){

                        ?>
<a href="/Grab_login.php" class="btn1" style="cursor: pointer;">
                  <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;LOG IN
                        <?php
                 
                              }
                      else{
                        ?>
                        <a class="btn1" style="cursor: pointer;" onclick="editData('<?php echo $row['cus_email'] ?>', '<?php echo $row['cus_name'] ?>', '<?php echo $row['cus_surname'] ?>', '<?php echo $row['cus_birthdate'] ?>', '<?php echo $row['cus_tel'] ?>','<?php echo $row['cus_address'] ?>','<?php echo $row['cus_password'] ?>')">
                  <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $row['cus_name']; ?>

                        <?php
                      }
                   
               ?>

                </a>
                <?php
                if($cus_email == "Guest"){
                  echo "";
                }
                else{
                  ?>

                  <a href="/logout.php" class="btn2">
                  <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;LOG OUT
                </a>
<?php 
                }
                  ?>
                 
              </div>

            </ul>

            <div class="user_optio_box">
            <a href="/history/history.php?cus_email=<?php echo $cus_email ?>">
            <i class="fa-solid fa-clock-rotate-left"></i>
              </a>
              

              <?php 

                      $count = 0;
                      $sql_cart = "SELECT * FROM cart WHERE cus_email = '$cus_email' AND status = '0'";
                      $objQuery = mysqli_query($conn, $sql_cart) or die("Error Query [" . $sql_cart . "]");
                      while ($objResult = mysqli_fetch_array($objQuery)) {
                        $count++;
                      }
                      if ($count > 0) { ?>

<style>
                          .CART {

                            position: relative;
                            display: inline-block;

                          }

                          .CART .img-top {
                            display: none;
                            position: absolute;
                            top: 0;
                            left: 0;
                            z-index: 99;
                            opacity: 0;
                          }

                          .CART:hover .img-top {
                            display: block;
                            opacity: 1;
                          }
                        </style>
                        <a href="/shopping/shopcart.php?name=<?php echo $cus_email; ?>">
                          <div class="CART">
                          <img src="/img/cart-warning.png" alt="CART Back" style="width:3rem; height:2.5rem; margin-left:1.5rem; margin-bottom:0.2rem;">
                            <img src="/img/cart-warning-hover.png" class="img-top" alt="CART Front" style="width:3rem; height:2.5rem; margin-left:1.5rem; margin-top:0.26rem; ">
                          </div>
                        </a>


                      <?php } else { ?>
                        <style>
                          .CART {

                            position: relative;
                            display: inline-block;

                          }

                          .CART .img-top {
                            display: none;
                            position: absolute;
                            top: 0;
                            left: 0;
                            z-index: 99;
                            opacity: 0;
                          }

                          .CART:hover .img-top {
                            display: block;
                            opacity: 1;
                          }
                        </style>
                        <a href="/shopping/shopcart.php?name=<?php echo $cus_email; ?>">
                          <div class="CART">
                            <img src="/img/cart.png" alt="CART Back" style="width:3rem; height:2.5rem; margin-left:1.5rem; margin-bottom:0.2rem;">
                            <img src="/img/cart-hover.png" class="img-top" alt="CART Front" style="width:3rem; height:2.5rem; margin-left:1.5rem; margin-top:0.26rem; ">
                          </div>
                        </a>


                    <?php } ?>
              
            </div>

          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">

      <div class="slider_bg_box">
        <img src="images/Banner.png" alt="">
      </div>

      <div id="customCarousel1" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      <!------------------------------------------------ THIS IS SHOW NAME ---------------------------------------------------------------------------------------->
                      <?php

                      if (!isset($_SESSION['user_name'])) {
                        $cus_email = "Guest";
                      }
                      else{
                      $cus_email = $_SESSION['user_name'];

                      $selectt = " SELECT * FROM cus WHERE cus_email = '$cus_email' ";

                      $resultt = mysqli_query($conn, $selectt);
                      $row = mysqli_fetch_array($resultt);
                      }
                      ?>

                      Welcome !!<div class="cl_name"><?php 
                      
                      if(!isset($_SESSION['user_name'])){
                        echo "Guest";
                              }
                      else{
                        echo $row['cus_name'];
                      }
                   
                      ?></div>to Grab Food
                    </h1>

                    <!-------------------------------------------------->
                    <p>
                      เราได้จัดเตรียมอาหารจานโปรด ร้านอาหาร และอาหารอร่อยอื่นๆ ทั้งหมดให้คุณได้สั่งซื้อได้ที่นี่แล้วครับ
                    </p>

                    <div class="btn-box">
                      <a href="#section_shop" class="btn1">
                        Orders Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!---------------------------------------------------------- service section --------------------------------------------------->

  <section class="service_section">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-3"><a href="#">
            <div class="box ">
              <div class="img-box">
                <img src="images/pic-food.png" alt="">
              </div>

              <div class="detail-box">
                <h5>Food Delivery</h5>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-3"><a href="#">
        <div class="box ">
          <div class="img-box">
            <img src="images/pic-shop1.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Shop</h5>
      </a>
    </div>
    </div>
    </div>

    <div class="col-md-6 col-lg-3"><a href="#">

        <div class="box ">

          <div class="img-box">
            <img src="images/pic-grab.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Grab Driver</h5>
      </a>
    </div>

    </div>
    </div>

    <div class="col-md-6 col-lg-3"><a href="#">
        <div class="box ">
          <div class="img-box">
            <img src="images/pic-topup.png" alt="">
          </div>
          <div class="detail-box">
            <h5>Top-Up Cash</h5>
      </a>
    </div>
    </div>
    </div>

    </div>
    </div>
  </section>

  <!------------------------------------------------------ Promo section -------------------------------------------------------->

  <section class="about_section layout_padding" id="promotion">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <!--<h2>Promotion for You</h2>-->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!----------------------------------------------------- FOOD product section ------------------------------------------------------->

  <section class="product_section" id="section_shop">
    <div class="container">
      <!-- หัวข้อ -->
      <div class="product_heading">
        <h2>Shop</h2>
      </div>

      <?php
      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      $i = 1;
      while ($objResult = mysqli_fetch_array($objQuery)) {
        if ($objResult['res_open_status'] == 'Close') {
          continue; // skip this product and go to the next one
        }
      ?>

        <!-- grab product -->
        <a href="/web-food-2/index.php?email=<?php echo $objResult['res_email']; ?>&name=<?php echo $cus_email;?>">
          <div class="product_container">
            <div class="box">

              <div class="box-content">

                <div class="img-box">
                  <img src="<?php echo '/webtable/uploads/' . $objResult["res_picture"]; ?>" alt="">
                </div>
                <div class="detail-box">
                  <div class="text">
                    <h5><?php echo $objResult["res_name"]; ?></h5>
                    <h6>
                      <span><?php echo $objResult["res_detail"]; ?></span>
                    </h6>
                  </div>
                  <div class="like">
                    <div class="star_container">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>

      <?php
        $i++;
      }
      ?>

    </div>
  </section>


  <!----------------------------------------------------- product1 section ------------------------------------------------------->
  <!----------------------------------------------------- product2 section ------------------------------------------------------->
  <!----------------------------------------------------- edit1 section ------------------------------------------------------->
  <!----------------------------------------------------- edit2 section -------------------------------------------------------->


  <!------------------------------------------------------ Buttom section --------------------------------------------------------->
  <section class="info_section layout_padding2" id="section_contact">
    <div class="container">
      <div class="info_logo">
        <img src="images/logo-grab-2.png" alt="">
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              Thank You
            </h5>
            <p>
              <a href="Member.php"><i class="fa-solid fa-user"></i> Member</a>
            </p>
            <!--  <div>
              <i class="fa-solid fa-person-praying"></i>
              <i class="fa-solid fa-person-praying"></i>
              <i class="fa-solid fa-person-praying"></i>
            </div> -->
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Website Recommended
            </h5>
            <p>
              <a href="https://food.grab.com/th/th/"><i class="fa-solid fa-location-arrow"></i> Real Website</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/9e7e14cf3d.js" crossorigin="anonymous"></script>
  <style>
    .form-group {
        text-align: left;
    }

    label {
        margin-right: 1rem;
    }
    </style>

  <script>
    


   


function setSession(email) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/set-session.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log('Session set successfully');
    } else {
      console.log('Error setting session');
    }
  };
  xhr.send('email=' + encodeURIComponent(email));
}

function editData(cus_email, cus_name, cus_surname, cus_birthdate, cus_tel, cus_address , cus_password) {
        // Display a pop-up window with a form for editing the data
        Swal.fire({
            title: 'Edit Profile',
            html: '<form id="edit-form" class="form">' +
                '<div class="form-group">' +
                '<label for="name" class="label font-weight-medium text-dark">Email :</label>' +
                '<input type="email" id="email" name="email" value="' + cus_email +
                '" class="form-control" disabled>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="name" class="label font-weight-medium text-dark">Name :</label>' +
                '<input type="text" id="name" name="name" value="' + cus_name + '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="surname" class="label font-weight-medium text-dark">Surname:</label>' +
                '<input type="text" id="surname" name="surname" value="' + cus_surname +
                '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="birthdate" class="label font-weight-medium text-dark">Birthdate:</label>' +
                '<input type="date" id="birthdate" name="birthdate" value="' + cus_birthdate +
                '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="tel" class="label font-weight-medium text-dark">Tel:</label>' +
                '<input type="text" id="tel" name="tel" value="' + cus_tel + '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="address" class="label font-weight-medium text-dark">Adress :</label>' +
                '<textarea id="address" name="address" class="form-control">' + cus_address + '</textarea>' +
                '</div>' +
                
                '<div class="form-group">' +
                '<label for="password" class="label font-weight-medium text-dark">Password:</label>' +
                '<input type="text" id="ppassword" name="ppassword" value="' + cus_password +
                '" class="form-control">' +
                '</div>' +
                '</form>',
            showCancelButton: true,
            confirmButtonText: 'Save',
            showLoaderOnConfirm: true,
            confirmButtonColor: '#10ae68',


            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                // Show a success message
                console.log($('#address').val());
                $.ajax({
                    type: 'POST',
                    url: '/webtable/update-data.php',
                    data: {
                        email: $('#email').val(),
                        name: $('#name').val(),
                        surname: $('#surname').val(),
                        birthdate: $('#birthdate').val(),
                        tel: $('#tel').val(),
                        address: $('#address').val(),
                        ppassword: $('#ppassword').val()
                    },
                    success: function(data) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data edited successfully.',
                            icon: 'success',
                            confirmButtonColor: '#10ae68'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        });
                    }
                });
            }

        });
    }
  </script>

</body>

</html>