<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);


$cart_ID = $_POST['cart_ID'];
$food_QUT = $_POST['food_QUT'];
$food_price = $_POST['food_price'];

echo $cart_ID;
echo $food_QUT;
echo $food_price;




$subtotal = $food_QUT * $food_price;


echo $subtotal;




$sql = "UPDATE cart SET food_amount = '$food_QUT', food_total = '$subtotal' WHERE cart_ID = '$cart_ID'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}   

mysqli_close($conn); // Close the database connection
?>



