<!DOCTYPE html>
<html>
<?php

session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';


$email = $_GET['email'];
$name = $_GET['name'];


mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");


$selectt = " SELECT * FROM restaurant WHERE res_email = '$email' ";
$resultt = mysqli_query($conn, $selectt);
$row = mysqli_fetch_array($resultt);


$select_cart = "SELECT * FROM cart WHERE cus_email = '$name' AND status = '0'";
$count_cart = mysqli_num_rows(mysqli_query($conn, $select_cart));


?>

<head>
  <!-- Basic -->
  <script src="sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/icon/icon-bar-1.png" type="">

  <title> Grab Food - Shop </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- font thai -->
  <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">


</head>

<body>
  <script>
function cart_null(){
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'ไม่มีสินค้าในตะกร้า',
   
  })
}

  </script>

  <div class="hero_area">
    <!-- header section strats -->
    <div class="w3-top">
      <header class="header_section">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" >
              <img src="images/logo-grab-3.png" alt="">
            </a>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <div id="changeWarning" class="cart_display">


                    <?php
                    if ($name == "Guest") {
                    ?>
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
                      <a onclick="add('g','<?php echo $name ?>')">

                        <i class="fa-solid fa-cart-shopping" style="font-size: 2.5rem; margin-top:14px; margin-bottom:14px;"></i>
                      </a>
                      <?php

                    } else {


                      $count = 0;
                      $sql_cart = "SELECT * FROM cart WHERE cus_email = '$name' AND status = '0'";
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
                        <a href="/shopping/shopcart.php?name=<?php echo $name; ?>">
                          <div class="CART">
                            <img src="/img/cart-warning.png" alt="CART Back" style="width:3rem; height:2.5rem; margin-left:1.5rem;">
                            <img src="/img/cart-warning-hover.png" class="img-top" alt="CART Front" style="width:3rem; height:2.5rem; margin-left:1.5rem; ">
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
                        <a href="#" onclick="cart_null()">
                          <div class="CART">
                            <img src="/img/cart.png" alt="CART Back" style="width:3rem; height:2.5rem; margin-left:1.5rem;">
                            <img src="/img/cart-hover.png" class="img-top" alt="CART Front" style="width:3rem; height:2.5rem; margin-left:1.5rem; ">
                          </div>
                        </a>
                        </div>
                </li>
              </ul>
            </div>
            <div class="user_option">
              <a href="/Grab-P/index.php" class="order_online">
                <i class="fa-solid fa-house"></i> Home
              </a>
            </div>
          </nav>
        </div>

                    <?php }
                    } ?>





                  

      </header>
    </div>
    <!-- end header section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="box-content">
      <div class="detail-box">
        <div class="flexbox">
          <div class="item">
            <div class="text">
              <img src="<?php echo '/webtable/uploads/' . $row["res_picture"]; ?>" alt="">
            </div>
          </div>
          <div class="item2">
            <div class="text">
              <h5><?php echo $row['res_name']; ?> - <?php echo $row['res_address']; ?></h5>
              <h6><span><?php echo $row['res_detail']; ?></span></h6>
              <h6><span>Tel : <?php echo $row['res_tel']; ?> </span></h6>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>

  <!-- end offer section -->

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          MENU
        </h2>
        <h4>
          <span>รายการอาหาร</span>
        </h4>
      </div>

      <!-- Search bar -->
      <!--    <div class="con-search">

        <form action="https://www.google.com/search" method="get" class="con-box-search">
          <input type="text" placeholder="search your food..." name="q">
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div> -->
      <div class="dropdown">

        <?php
        // Assuming that $conn is a valid MySQL database connection
        $sql = "SELECT * FROM food_type";
        $res = mysqli_query($conn, $sql);
        ?>

        <select id="type_ID" name="type_ID" class="form-control" onchange="showSelectedType()">
          <?php
          // Loop through the results and display each food type as an option

          while ($row = mysqli_fetch_assoc($res)) {
            echo '<option value="' . $row['type_ID'] . '">' . $row['type_name'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="filters-content">
        <div class="row" id="product">


          <?php
          $request_body = file_get_contents('php://input');
          $data = json_decode($request_body, true);


          $item = $data['type_ID'];


          ?>
        </div>


      </div>
    </div>
  </section>

  <!-- end food section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Thank You
            </h4>

          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <h4>
              Website Recommended
            </h4>
            <p>
              <a href="https://food.grab.com/th/th/"><i class="fa-solid fa-location-arrow"></i> Real Website</a>
            </p>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
        </div>
      </div>

    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="js/dropdown.js"></script>
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/9e7e14cf3d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    .form-group {
        text-align: center;
    }

    label {
        margin-right: 1rem;
    }
    input{
        margin-top: 1rem;
        width: 20%;
        text-align: right;

    }
    
    </style>
    <?php
      $sql_check = "SELECT * FROM cart WHERE cus_email = '$name' AND status = '0'";
      $result_check = mysqli_query($conn, $sql_check);
      
      $row_check = mysqli_fetch_assoc($result_check);

      $res_email = $row_check['res_email'];


      

    ?>
  <script>
    const email = "<?php echo $email; ?>";

    async function showSelectedType() {
      var selectElement = document.getElementById("type_ID");
      var selectedValue = selectElement.options[selectElement.selectedIndex].value;
      console.log(selectedValue);
      var sendd = await axios.post('http://localhost/web-food-2/process.php', {
        type_ID: selectedValue,
        email

      })
      //AFTER SORTING-------------------------------------------------------------------------------------------------
      //AFTER SORTING-------------------------------------------------------------------------------------------------
      //AFTER SORTING-------------------------------------------------------------------------------------------------
      //AFTER SORTING-------------------------------------------------------------------------------------------------
      //AFTER SORTING-------------------------------------------------------------------------------------------------
      //AFTER SORTING-------------------------------------------------------------------------------------------------
      document.getElementById("product").innerHTML = sendd.data.map((item) => {
        const formattedPrice = new Intl.NumberFormat('en-US', { 
            style: 'currency',
            currency: 'THB' 
        }).format(item.food_price);
        return `<div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="/webtable/uploads/${item.food_picture}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    ${item.food_name}
                  </h5>
                  <p>
                    ${item.food_detail}
                  </p>
                  <div class="options">
                    <h6>
                     ${item.food_price} Bath
                    </h6>
              
                    <a onclick="add('${item.food_ID}','<?php echo $name ?>','<?php echo $res_email ?>')">
                      &nbsp; ADD &nbsp;<i class="fa-solid fa-cart-shopping"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    `
      }).join('');

      console.log(sendd);
    }
    //AFTER SORTING-------------------------------------------------------------------------------------------------
    //AFTER SORTING-------------------------------------------------------------------------------------------------
    //AFTER SORTING-------------------------------------------------------------------------------------------------
    //AFTER SORTING-------------------------------------------------------------------------------------------------


    (async () => {

      var sendd = await axios.post('http://localhost/web-food-2/process.php', {
        type_ID: "type_0001",
        email

      })

      document.getElementById("product").innerHTML = sendd.data.map((item) => {
        const formattedPrice = new Intl.NumberFormat('en-US', { 
            style: 'currency',
            currency: 'THB' 
        }).format(item.food_price);
        return `<div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="/webtable/uploads/${item.food_picture}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    ${item.food_name}
                  </h5>
                  <p>
                    ${item.food_detail}
                  </p>
                  <div class="options">
                    <h6>
                     ${item.food_price} Bath
                    </h6>
                    <a onclick="add('${item.food_ID}','<?php echo $name ?>','<?php echo $res_email ?>')">
                      &nbsp; ADD &nbsp;<i class="fa-solid fa-cart-shopping"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    `
      }).join('');

      console.log(sendd);

    })()


    function add(food_ID, name,res_email) {
      if (name == "Guest") {
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Please login',
          showConfirmButton: false,
          timer: 1000
        })
      } else {
        Swal.fire({
          title: 'ระบุจำนวนสินค้า',
          html: '<form id="edit-form" class="form">' +
                '<div class="form-group">' +
                '<label for="quantity" class="label font-weight-medium text-dark">จำนวน :</label>' +
                '<input type="number" id="quantity" name="quantity" value="1" >'+ 
                '</div>' +
                '</form>',
          showCancelButton: true,
          showConfirmButton: true,
          confirmButtonText: 'Add',
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#10ae68',
          focusConfirm: false,
          allowOutsideClick: () => !Swal.isLoading()
        }).then ((result) => {
          if (result.isConfirmed) {
            let quantity = document.getElementById('quantity').value;
  
        let xhr = new XMLHttpRequest();
        xhr.onload = function() {
          console.log(xhr.response);
        };

        let formData = new FormData();
        formData.append('food_ID', food_ID);
        formData.append('name', name);
        formData.append('quantity', quantity);
        formData.append('res_email', res_email);


        xhr.open('POST', '/shopping/sen.php');

        xhr.send(formData);

        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Add to cart',
          showConfirmButton: false,
          timer: 1300
        })
        setTimeout(function() {
          location.reload();
        }, 700);
     
          


        document.getElementById("changeWarning").innerHTML = `<style>
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
        <a href="/shopping/shopcart.php?name=<?php echo $name; ?>">
                          <div class="CART">
                            <img src="/img/cart-warning.png" alt="CART Back" style="width:3rem; height:2.5rem; margin-left:1.5rem;">
                            <img src="/img/cart-warning-hover.png" class="img-top" alt="CART Front" style="width:3rem; height:2.5rem; margin-left:1.5rem; ">
                          </div>
                        </a>`;


      }
    })


    }
    document.getElementById("quantity").addEventListener("input", function() {
        // Get the input value
        var value = this.value;
        // Check if the input value is a valid integer
        if (isNaN(value) || !Number.isInteger(Number(value))) {
            // If not, disable the "Save" button
            document.querySelector(".swal2-confirm").disabled = true;
        } else {
            // If yes, enable the "Save" button
            document.querySelector(".swal2-confirm").disabled = false;
        }
    });
 
    }
  </script>
  <script src="sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>