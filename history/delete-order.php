<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");


    $delete_ID = $_POST['order_ID'];

    // SQL delete command
    $sql_cart = 'DELETE FROM cart WHERE order_ID = "' . $delete_ID . '";';
    mysqli_query($conn, $sql_cart);
    $sql = 'DELETE FROM food_order WHERE order_ID = "' . $delete_ID . '";';
    mysqli_query($conn, $sql);




mysqli_close($conn); // Close the database connection
?>