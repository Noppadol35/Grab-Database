<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);


$food_ID = $_POST['food_ID'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$res_email_input = $_POST['res_email'];

echo "The food ID is: " . $food_ID;
echo "The name is: " . $name;


$sql = "SELECT * FROM food WHERE food_ID = '$food_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");

while ($objResult = mysqli_fetch_array($objQuery)) {


    $food_ID = $objResult["food_ID"];
    $food_price = $objResult["food_price"];
    $res_email = $objResult["res_email"];

}



$QUT = $quantity;

$subtotal = $QUT * $food_price;


$order_date = date("Y-m-d");

$sql_check = "SELECT * FROM food_order WHERE cus_email = '$name' AND order_status = '3'";
$check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($check) > 0) {
    echo "You have already ordered";
} else {
    $sql = "INSERT INTO food_order (order_ID,order_product, order_price, order_date, cus_email, res_email, pay_type, order_status)
VALUES ('', 'waiting', '0', '$order_date', '$name', '$res_email', '1', '3')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql_check = "SELECT * FROM food_order WHERE cus_email = '$name' AND order_status = '3'";
$check = mysqli_query($conn, $sql_check);
$objQuery_check = mysqli_query($conn, $sql_check) or die("Error Query [" . $sql_check . "]");
while ($objResult_check = mysqli_fetch_array($objQuery_check)) {
    $order_ID = $objResult_check["order_ID"];
}

$sql = "INSERT INTO cart (cus_email, food_ID, food_amount, food_total, res_email ,status,order_ID) 
VALUES ('$name', '$food_ID', '$QUT', '$subtotal', '$res_email' , '0', '$order_ID')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
?>