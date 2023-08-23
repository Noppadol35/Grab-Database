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

$res_picture = $_FILES['res_picture']['name'];
$res_name = $_POST['res_name'];
$res_email = $_POST['res_email'];
$res_password = $_POST['res_password'];
$res_open_status = $_POST['res_open_status'];
$res_tel = $_POST['res_tel'];
$res_detail = $_POST['res_detail'];
$res_address = $_POST['res_address'];


// Upload the picture file to the server (optional)
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["res_picture"]["name"]);
move_uploaded_file($_FILES["res_picture"]["tmp_name"], $target_file);

// Insert the data into the database
$sql = "INSERT INTO restaurant (res_picture, res_name, res_email, res_password, res_open_status, res_tel, res_detail, res_address) 
VALUES ('$res_picture', '$res_name', '$res_email', '$res_password','$res_open_status', '$res_tel', '$res_detail' , '$res_address')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
$st
?>
