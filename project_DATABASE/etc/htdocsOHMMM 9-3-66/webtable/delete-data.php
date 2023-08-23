<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if (isset($_POST['cus_email']) && !empty($_POST['cus_email'])) 
{
    $delete_ID = $_POST['cus_email'];

    // SQL delete command
    $sql = 'DELETE FROM cus WHERE cus_email = "' . $delete_ID . '";';
    mysqli_query($conn, $sql);

} 
else 
{
    echo "Error: cus_email field is not set or empty";
}

mysqli_close($conn); // Close the database connection
?>