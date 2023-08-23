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
$pro = mysqli_real_escape_string($conn, $_POST['pro']);
$order_price = mysqli_real_escape_string($conn, $_POST['price']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$cus_email = mysqli_real_escape_string($conn, $_POST['cus_name']);
$res_email = mysqli_real_escape_string($conn, $_POST['res_name']);
$payment = mysqli_real_escape_string($conn, $_POST['payment_name']);
$order_status = mysqli_real_escape_string($conn, $_POST['status_name']);

echo $id;
echo $pro;
echo $order_price;
echo $date;
echo $cus_email;
echo $res_email;
echo $payment;
echo $order_status;


// Prepare the SQL statement to update the data in the database
$stmt = $conn->prepare("UPDATE food_order SET order_product = ?, order_price = ?, order_date = ?, cus_email = ?, res_email = ?, pay_type = ?, order_status = ? WHERE order_ID = ?");
$stmt->bind_param("sssssssi", $pro, $order_price, $date, $cus_email, $res_email, $payment , $order_status, $id);
$stmt->execute();

// Check if the query was successful
if ($stmt->affected_rows > 0) {
    echo 'Data updated successfully';
} else {
    echo 'No rows were affected';
}

// Close the database connection
mysqli_close($conn);

?>
