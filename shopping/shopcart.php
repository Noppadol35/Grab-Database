<?php
session_start();

$name = $_GET['name'];


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM cart WHERE cus_email = '$name' AND status = '0'";

$result = mysqli_query($conn, $sql);
$row_check = mysqli_fetch_assoc($result);





	

$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
$nam = 0;




?>

<!DOCTYPE html>

<html>

<head>
	<title>Grab - Billed</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href=" https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="shortcut icon" href="assets/img/icon/icon-bar-1.png" type="">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.13.1/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.13.1/dist/sweetalert2.min.js"></script>
	<!-- font awesome style -->
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- font thai -->
	<link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
	<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
	<main class="page">
		<section class="shopping-cart dark">
			<div class="container">
				<div class="iconback">
				<?php $count = mysqli_num_rows($result);
								if ($count > 0) {
									$res_check = $row_check['res_email'];
									?>
									<a href="/web-food-2/index.php?email=<?php echo $res_check ?>&name=<?php echo $name ?>">
									<i><</i> Back
								</a>
								<?php }
								else {
									?>
									<a href="/Grab-P/index.php">
									<i class="fa-solid fa-house"></i> HOME

								</a>
								<?php } ?>
								
								
					
				</div>
				<div class="block-heading">
					<h2>Shopping Cart</h2>
					<p>รายการสินค้าทั้งหมด</p>

				</div>

				<div class="content">
					<div class="row">
						<div class="col-md-12 col-lg-8">
							<!-- Items -->
							<!-- Items -->
							<!-- Items -->
							<!-- Items -->
							<div class="items">

								<!-- Product Mask 1 -->
								<?php
								$subtotal = 0;
								$order_product = '';
								$count = mysqli_num_rows($result);
								if ($count > 0) {
									$res_check = $row_check['res_email'];

									while ($objResult = mysqli_fetch_array($objQuery)) {

										//in table cart -----------------------------------
										//-----------------------------------------------
										$cart_ID = $objResult["cart_ID"];
										$cus_email = $objResult["cus_email"];
										$food_ID = $objResult["food_ID"];
										$food_amount = $objResult["food_amount"];
										$food_total = $objResult["food_total"];
										$res_email = $objResult["res_email"];
										//-----------------------------------------------
										//-----------------------------------------------

										//FK -------------------------------------------

										$sql2 = "SELECT * FROM food WHERE food_ID = '$food_ID'";
										$objQuery2 = mysqli_query($conn, $sql2) or die("Error Query [" . $sql2 . "]");
										$objResult2 = mysqli_fetch_array($objQuery2);


										$food_picture = $objResult2["food_picture"];
										$food_name = $objResult2["food_name"];
										$food_detail = $objResult2["food_detail"];
										$food_price = $objResult2["food_price"];
										//-----------------------------------------------
								?>
										<?php
										$subtotal += $food_total;
										$order_product .= $food_name . 'x' . $food_amount . ' |  ';
										?>

										<div class="product">

											<a onclick="del('<?php echo $cart_ID; ?>','<?php echo $cus_email ?>')"><i class="fa-sharp fa-solid fa-circle-xmark"></i></a>

											<div class="row">
												<div class="col-md-3">
													<img class="img-fluid mx-auto d-block image" src="<?php echo '/webtable/uploads/' . $food_picture; ?>">
												</div>
												<div class="col-md-8">
													<div class="info">
														<div class="rowitem">
															<div class="col-md-4 product-name">
																<div class="product-name">
																	<span><?php echo $food_name; ?></span>
																	<div class="product-info">
																		<span class="value"><?php echo $food_detail; ?></span>
																	</div>
																</div>
															</div>
															<div class="col-md-4 quantity">
																<label for="quantity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน</label><br>
																<div class="amountt">
																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $food_amount; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
																<i class="fa-solid fa-pen fa-sm" onclick = "edit_QUT('<?php echo $food_amount; ?>','<?php echo $cart_ID; ?>','<?php echo $food_price; ?>')" style = "cursor:pointer;"></i>
																</div>
																
															
															</div>
															<div class="col-md-4 quantity">
																<label for="price">ราคา/ชิ้น</label>
																<br><?php echo number_format($food_price, 2, ".", ","); ?> ฿</br>
															</div>
															<div class="col-md-4 quantity">
																<label for="price">ราคาทั้งหมด</label>
																<br><?php echo number_format($food_total, 2, ".", ","); ?> ฿</br>
															</div>


														</div>
													</div>
												</div>
											</div>
										</div>

									<?php
									}
									?>



								<?php
								} else {
									$nam = 1;
								?>

									<div class="noitem">ไม่มีรายการสินค้า</div>
								<?php
								}




								?>
							</div>
							<!-- End Items -->
							<!-- End Items -->
							<!-- End Items -->
							<!-- End Items -->

						</div>
						<div class="col-md-12 col-lg-4">
							<div class="summary">
								<img src="assets/img/logo-grab-3.png" class="img-fluid mx-auto d-block">
								<!-- <h3>Total Prices</h3> -->

								<div class="summary-item"><span class="text">Total Prices</span><span class="price"> <?php echo number_format($subtotal, 2, ".", ","); ?> ฿</span></div>
								<div class="contbutt">



									<div class="payment">
										<span>วิธีการชำระเงิน</span>
									</div>

									<label>
										<input type="radio" name="radio" id="text1" value="1" checked />
										<span>ชำระเงินปลายทาง</span>
									</label>
									<br>
									<label>
										<input type="radio" name="radio" id="text2" value="2" />
										<span>บัตรเครดิต</span>
									</label>



									<?php

									$order_ID = '';
									$order_price = $subtotal;
									$order_status = 0;
									$order_date = date("Y-m-d");
									$cus_email = $name;


									?>
									<?php
											if ($count > 0) {
									?>
									<button onclick="sub_order('<?php echo $order_ID ?>','<?php echo $order_product ?>','<?php echo $order_price ?>','<?php echo $order_status ?>','<?php echo $order_date ?>','<?php echo $cus_email ?>','<?php echo $res_email ?>')" name="submit" id="submit" class="btn btn-primary btn-block">ชำระเงิน</button>
									<?php
											}
											else{ ?>
												<button name="submit" id="submit" class="btn btn-primary btn-block" disabled>ชำระเงิน</button>
									<?php
											}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
	</main>

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

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- fontawesome -->
	<script src="https://kit.fontawesome.com/9e7e14cf3d.js" crossorigin="anonymous"></script>
</body>


<script>
	function del(cart_ID,cus_email) {
		var cart_ID = cart_ID;
		var cus_email = cus_email;
		$.ajax({
			type: 'POST',
			url: 'delete-cart.php',
			data: {
				cart_ID: cart_ID,
				cus_email: cus_email
			}

		});


		setTimeout(function() {
			location.reload();
		}, 100);
	}

	function sub_order(order_ID, order_product, order_price, order_status, order_date, cus_email,res_email) {
        var order_ID = order_ID;
        var order_product = order_product;
        var order_price = order_price;
        var order_status = order_status;
        var order_date = order_date;
        var cus_email = cus_email;
        var pay_type = $('input[name=radio]:checked').val();
		var res_email = res_email;

        $.ajax({
            type: 'POST',
            url: 'sub-order.php',
            data: {
                order_product: order_product,
                order_price: order_price,
                order_status: order_status,
                order_date: order_date,
                cus_email: cus_email,
                pay_type: pay_type,
				res_email : res_email
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: 'สั่งซื้อสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                });
				setTimeout(function() {
					window.location.href = '/Grab-P/index.php';
		}, 1000);
                
            }
        });
} 


function edit_QUT(QUT,cart_ID,food_price) {
	var cart_ID = cart_ID;
	var food_price = food_price;
	Swal.fire({
          title: 'ระบุจำนวนสินค้า',
          html: '<form id="edit-form" class="form">' +
                '<div class="form-group">' +
                '<label for="quantity" class="label font-weight-medium text-dark">จำนวน :</label>' +
                '<input type="number" id="quantity" name="quantity" value="' + QUT + '" min="1" max="9999" required>' +
                '</div>' +
                '</form>',
          showCancelButton: true,
          showConfirmButton: true,
          confirmButtonText: 'Save',
          cancelButtonText: 'Cancel',
          confirmButtonColor: '#10ae68',
          focusConfirm: false,
		  allowOutsideClick: () => !Swal.isLoading()
		}).then((result) => {
		  if (result.value) {
			var quantity = $('#quantity').val();
			

			$.ajax({
				type: 'POST',
				url: 'update-cart.php',
				data: {
					cart_ID: cart_ID,
					food_QUT: quantity,
					food_price: food_price
				}

			});
		  }
		  location.reload();
		})
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

</html>