<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

$sql = "SELECT food_ID FROM food";
$result = mysqli_query($conn, $sql);




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

$stmt = $conn->prepare("UPDATE food SET food_ID=?, food_name=?, food_detail=?, food_price=?, type_ID=?, res_email=? ".(!is_null($food_picture) ? ", food_picture=?" : "")." WHERE food_ID=?");

if(!is_null($food_picture)){
    $stmt->bind_param("ssssssss", $food_ID, $food_name, $food_detail, $food_price, $type_ID, $res_email, $food_picture, $food_ID);
} else {
    $stmt->bind_param("sssssss", $food_ID, $food_name, $food_detail, $food_price, $type_ID, $res_email, $food_ID);
}


$stmt->execute();

if ($stmt->affected_rows > 0) {
	echo "Record " . $res_email . " was updated.";
} else {
	echo "Error: Update failed.";
}

$stmt->close();
$conn->close();
?>