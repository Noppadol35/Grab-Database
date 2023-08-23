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
$id = mysqli_real_escape_string($conn, $_POST['id']);
$order_price = mysqli_real_escape_string($conn, $_POST['price']);
$order_status = mysqli_real_escape_string($conn, $_POST['status']);
$cus_email = mysqli_real_escape_string($conn, $_POST['consumer']);
$rider_email = mysqli_real_escape_string($conn, $_POST['rider']);
$payment = mysqli_real_escape_string($conn, $_POST['payment']);

// Prepare the SQL statement to insert the data into the database
$sql = "INSERT INTO food_order (order_ID, order_price, order_status, cus_email, rider_email, payment_ID) VALUES ('$id', '$order_price', '$order_status', '$cus_email', '$rider_email', '$payment')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>