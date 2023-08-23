<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if (isset($_POST['rider_email']) && !empty($_POST['rider_email'])) 
{
    $delete_ID = $_POST['rider_email'];

    // SQL delete command
    $sql = 'DELETE FROM rider WHERE rider_email = "' . $delete_ID . '";';
    mysqli_query($conn, $sql);

} 
else 
{
    echo "Error: rider_email field is not set or empty";
}

mysqli_close($conn); // Close the database connection
?>