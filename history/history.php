<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


$cus_email = $_GET['cus_email'];



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

	<!-- font awesome style -->
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
		integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- font thai -->
	<link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css"
		href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
	<!--templateตารางข้างในตารางขาว-->
</head>

<body>
	<main class="page">
		<section class="shopping-cart dark">
			<div class="container">
				<div class="iconback">
					<a href="/Grab-P/index.php">
						<i class="fa-solid fa-circle-chevron-left"></i>
					</a>
				</div>

				<div class="block-heading">
					<h2>History</h2>
					<p>ประวัติการสั่งซื้อ</p>
				</div>

				<div class="content">
					<div class="row">
						<div class="col">
							<!-- Items -->
							<div class="items">
								<!-- Product Mask 1 -->
								<div class="product">
									<div class="container bootdey">
										<div class="panel panel-default panel-order">
											<div class="panel-heading">
												<strong>Order history</strong>
												
											</div>
											<br>
											<div class="panel-body">
										
													

												<?php
														$sql_order = "SELECT * FROM food_order WHERE cus_email = '$cus_email'";
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

															$sql_status = "SELECT * FROM order_status WHERE order_status_ID = '$order_status'";
															$result_status = mysqli_query($conn, $sql_status);
															$objResult_status = mysqli_fetch_array($result_status);
															$order_statusD = $objResult_status['status_name'];
												  

?>
	<div class="row">
													<!--<div class="col-md-1"><img src="https://bootdey.com/img/Content/user_1.jpg" class="media-object img-thumbnail" /></div>-->
													<div class="col-md-11">
														<div class="row">
															<div class="col-md-12">
																<div class="pull-right">
										
																	<?php if ($order_status == 0) { ?>
																	<label class="btn btn-danger" onclick="del('<?php echo $order_ID; ?>')">ยกเลิก</label>
																	<label class="btn btn-primary"><?php echo $order_statusD; ?></label>
																	<?php } else if ($order_status == 1) { ?>
																		<label class="btn btn-warning"><?php echo $order_statusD; ?></label>
																	<?php } else if ($order_status == 2) { ?>
																		<label class="btn btn-success"><?php echo $order_statusD; ?></label>
																		<?php } ?>
																</div>
																<span><strong>Order ID</strong></span> <span
																	class="label label-info"><?php echo $order_ID; ?><br></span>
																<span><strong>Order Food</strong></span> <span
																class="label label-info"><?php echo $order_product; ?></span>
																	<br />
																	<strong>Order price :</strong> <?php echo number_format($order_price,2,".",","); ?><br />

															</div>
															<div class="col-md-12">order made on: <?php echo $order_date; ?> by
																<a><?php echo  $cus_email; ?> </a></div>
														</div>
													</div>
												</div>




<?php }
} 
else {
?>
<p>NO Order</p>



<?php
}
?>

												
											
											</div>
										</div>
									</div>


									<!--<div class="info">
							 						<div class="col-md-4 product-name">
							 							<div class="product-name">
								 							<table>
																<tr>
																	<td>order_ID</td>
																</tr>
															</table>
									 					</div>
							 						</div>-->
								</div>
							</div>

						</div><!-- End Items -->

					</div>

					<div class="col-md-12 col-lg-4">

					</div>
				</div>
			</div>
			</div>
		</section>
	</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/9e7e14cf3d.js" crossorigin="anonymous"></script>

<script>
function del(order_ID) {
		var order_ID = order_ID;
		$.ajax({
			type: 'POST',
			url: 'delete-order.php',
			data: {
				order_ID: order_ID
			}

		});


		setTimeout(function() {
			location.reload();
		}, 100);
	}

</script>

</body>

</html>