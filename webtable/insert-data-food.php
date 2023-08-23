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

$food_picture = $_FILES['food_picture']['name'];
$food_ID = $_POST['food_ID'];
$food_name = $_POST['food_name'];
$food_detail = $_POST['food_detail'];
$food_price = $_POST['food_price'];
$type_ID = $_POST['type_ID'];
$res_email = $_POST['res_name'];



// Upload the picture file to the server (optional)
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["food_picture"]["name"]);
move_uploaded_file($_FILES["food_picture"]["tmp_name"], $target_file);

// Insert the data into the database
$sql = "INSERT INTO food (food_picture, food_ID, food_name, food_detail, food_price, type_ID, res_email) 
VALUES ('$food_picture', '$food_ID', '$food_name', '$food_detail', '$food_price', '$type_ID', '$res_email')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
$st
?>
