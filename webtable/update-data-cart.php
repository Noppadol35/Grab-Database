<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

$sql = "SELECT cart_ID FROM cart";
$result = mysqli_query($conn, $sql);




$cart_ID = $_POST['id'];
$cus_name = $_POST['cus_name'];
$food_name = $_POST['food_name'];
$food_amount = $_POST['food_amount'];

$status_name = $_POST['status_name'];
$order_ID = $_POST['order_ID'];
$food_price = $_POST['food_price'];



$food_ID = $food_name;
$sqlfood = "SELECT * FROM food WHERE food_ID = '$food_ID'";
$resfood = mysqli_query($conn, $sqlfood);
$rowfood = mysqli_fetch_array($resfood);


$food_price = $rowfood['food_price'];
$res_email = $rowfood['res_email'];



$food_total = $food_amount * $food_price;


$stmt = $conn->prepare("UPDATE cart SET cus_email = ?, food_ID = ?, food_amount = ?, food_total = ?, res_email = ?, status = ?, order_ID = ? WHERE cart_ID = ?");
$stmt->bind_param("ssssssss", $cus_name, $food_name, $food_amount, $food_total, $res_email, $status_name, $order_ID, $cart_ID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
	echo "Record " . $res_email . " was updated.";
} else {
	echo "Error: Update failed.";
}



$stmt->close();
$conn->close();
?>