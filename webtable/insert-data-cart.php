<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grab";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the data from the form submission

$cus_name = $_POST['cus_name'];
$food_name = $_POST['food_name'];
$food_amount = $_POST['food_amount'];

$status_name = $_POST['status_name'];
$order_ID = $_POST['order_ID'];



$food_ID = $food_name;
$sqlfood = "SELECT * FROM food WHERE food_ID = '$food_ID'";
$resfood = mysqli_query($conn, $sqlfood);
$rowfood = mysqli_fetch_array($resfood);


$food_price = $rowfood['food_price'];
$res_email = $rowfood['res_email'];

$food_total = $food_amount * $food_price;


// Upload the picture file to the server (optional)


// Insert the data into the database
$sql = "INSERT INTO cart (cart_ID, cus_email, food_ID, food_amount, food_total, res_email, status, order_ID)
VALUES ('', '$cus_name', '$food_name', '$food_amount', '$food_total', '$res_email', '$status_name', '$order_ID')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
$st
?>
