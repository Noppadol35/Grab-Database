<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

$sql = "SELECT res_email FROM restaurant";
$result = mysqli_query($conn, $sql);

$res_picture = $_FILES['res_picture']['name'];
$res_name = $_POST['res_name'];
$res_email = $_POST['res_email'];
$res_password = $_POST['res_password'];
$res_open_status = $_POST['res_open_status'];
$res_tel = $_POST['res_tel'];
$res_detail = $_POST['res_detail'];
$res_address = $_POST['res_address'];

echo $res_picture, $res_name, $res_email, $res_password, $res_open_status, $res_tel, $res_detail, $res_address;

// Upload the picture file to the server (optional)
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["res_picture"]["name"]);
move_uploaded_file($_FILES["res_picture"]["tmp_name"], $target_file);

$stmt = $conn->prepare("UPDATE restaurant SET res_name=?, res_email=?, res_password=?, res_open_status=?, res_tel=?, res_detail=?, res_address=? ".(!is_null($res_picture) ? ", res_picture=?" : "")." WHERE res_email=?");

if(!is_null($res_picture)){
    $stmt->bind_param("sssssssss", $res_name, $res_email, $res_password, $res_open_status, $res_tel, $res_detail, $res_address, $res_picture, $res_email);
} else {
    $stmt->bind_param("ssssssss", $res_name, $res_email, $res_password, $res_open_status, $res_tel, $res_detail, $res_address, $res_email);
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