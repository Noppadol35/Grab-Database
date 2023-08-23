<?php

// Set database credentials
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}


// Retrieve the data sent from the client-side
$pro = mysqli_real_escape_string($conn, $_POST['pro']);
$order_price = mysqli_real_escape_string($conn, $_POST['price']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$cus_email = mysqli_real_escape_string($conn, $_POST['cus_name']);
$res_email = mysqli_real_escape_string($conn, $_POST['res_name']);
$payment = mysqli_real_escape_string($conn, $_POST['payment_name']);
$order_status = mysqli_real_escape_string($conn, $_POST['status_name']);


// Prepare the SQL statement to insert the data into the database
$sql = "INSERT INTO food_order (order_ID, order_product, order_price, order_date, cus_email, res_email, pay_type, order_status) VALUES ('','$pro', '$order_price', '$date', '$cus_email', '$res_email', '$payment', '$order_status')";


// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>