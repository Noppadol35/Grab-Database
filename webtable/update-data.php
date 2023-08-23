<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");

$sql = "SELECT cus_email FROM cus";
$result = mysqli_query($conn, $sql);




$cus_email = $_REQUEST['email'];
$cus_name = $_REQUEST['name'];
$cus_surname = $_REQUEST['surname'];
$cus_birthday = $_REQUEST['birthdate'];
$cus_tel = $_REQUEST['tel'];
$cus_password = $_REQUEST['ppassword'];
$cus_address = $_REQUEST['address'];
echo $cus_address;

$stmt = $conn->prepare("UPDATE cus SET cus_name=?, cus_surname=?, cus_birthdate=?, cus_address=?, cus_tel=? , cus_password=? WHERE cus_email=?");
$stmt->bind_param("sssssss", $cus_name, $cus_surname, $cus_birthday  ,$cus_address , $cus_tel ,$cus_password, $cus_email);
$stmt->execute();

if ($stmt->affected_rows > 0) 
	{
	echo "Record " . $cus_email . " was updated.";
	} 
else 
	{
	echo "Error: Update failed.";
	}



$stmt->close();
$conn->close();
?>