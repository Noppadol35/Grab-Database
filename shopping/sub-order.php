<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);


$order_ID = "";
$order_product = $_POST['order_product'];
$order_price = $_POST['order_price'];
$order_status = $_POST['order_status'];
$order_date = $_POST['order_date'];
$cus_email = $_POST['cus_email'];
$pay_type = $_POST['pay_type'];
$res_email = $_POST['res_email'];







$sql_order = "SELECT * FROM food_order WHERE cus_email = '$cus_email' AND order_status = '3'";
$result_order = mysqli_query($conn, $sql_order);
$row_order = mysqli_fetch_assoc($result_order);
$objQuery_order = mysqli_query($conn, $sql_order) or die("Error Query [" . $sql_order . "]");
while ($objResult_order = mysqli_fetch_array($objQuery_order)) {
    $order_ID = $objResult_order["order_ID"];
}

$sql_update_cart = "UPDATE cart SET order_ID = '$order_ID' , status = '1' WHERE cus_email = '$cus_email' AND status = '0'";
if (mysqli_query($conn, $sql_update_cart)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}






$sql = "UPDATE food_order SET order_product = '$order_product', order_price = '$order_price', order_status = '$order_status', order_date = '$order_date', cus_email = '$cus_email', res_email = '$res_email', pay_type = '$pay_type' WHERE cus_email = '$cus_email' AND order_status = '3'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}










mysqli_close($conn);


?>