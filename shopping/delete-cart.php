<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");


    $delete_ID = $_POST['cart_ID'];
    $cus_email = $_POST['cus_email'];
    echo $cus_email;
    
    // SQL delete command
    $sql = 'DELETE FROM cart WHERE cart_ID = "' . $delete_ID . '";';
    mysqli_query($conn, $sql);

    $sql_check = "SELECT * FROM cart WHERE cus_email = '$cus_email' AND status = '0'";
    $res_check = mysqli_query($conn, $sql_check);
    $row_check = mysqli_fetch_array($res_check);
    $count_check = mysqli_num_rows($res_check);
    echo $count_check;

    if ($count_check == 0) {
        $sql_order = "DELETE FROM food_order WHERE cus_email = '$cus_email' AND order_status = '3'";

        mysqli_query($conn, $sql_order);
    }

   


mysqli_close($conn); // Close the database connection
?>