<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

$sql = "SELECT rider_email FROM rider";
$result = mysqli_query($conn, $sql);

$rider_email = $_REQUEST['email'];
$rider_name = $_REQUEST['name'];
$rider_surname = $_REQUEST['surname'];
$rider_birthday = $_REQUEST['birthdate'];
$rider_tel = $_REQUEST['tel'];
$rider_password = $_REQUEST['ppassword'];
$rider_salary = $_REQUEST['salary'];

$stmt = $conn->prepare("UPDATE rider SET rider_name=?, rider_surname=?, rider_birthdate=?, rider_tel=?, rider_password=?, rider_salary=? WHERE rider_email=?");
$stmt->bind_param("sssssss", $rider_name, $rider_surname, $rider_birthday, $rider_tel, $rider_password, $rider_salary, $rider_email);
$stmt->execute();

if ($stmt->affected_rows > 0) {
	echo "Record " . $rider_email . " was updated.";
} else {
	echo "Error: Update failed.";
}

$stmt->close();
$conn->close();
?>