<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if (isset($_POST['order_ID']) && !empty($_POST['order_ID'])) 
{
    $delete_ID = $_POST['order_ID'];

    // SQL delete command
    $sql = 'DELETE FROM food_order WHERE order_ID = "' . $delete_ID . '";';
    mysqli_query($conn, $sql);

} 
else 
{
    echo "Error: order_ID field is not set or empty";
}

mysqli_close($conn); // Close the database connection
?>