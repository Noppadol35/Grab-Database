<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

$res_picture  			= $_REQUEST['res_picture'];
$res_name				= $_REQUEST['res_name'];
$res_email 		  		= $_REQUEST['res_email'];
$res_password		  	= $_REQUEST['res_password'];
$res_open_status	  	= $_REQUEST['res_open_status'];
$res_tel		  		= $_REQUEST['res_tel'];
$res_detail 			= $_REQUEST['res_detail'];
$res_address	 		= $_REQUEST['res_address'];


$sql = "
	UPDATE restaurant SET 
	res_picture		='$res_picture', 
	res_name		='$res_name', 
	res_password	='$res_password', 
	res_email		='$res_email', 
	res_open_status	='$res_open_status', 
	res_tel			='$res_tel', 
	res_detail		='$res_detail', 
	res_address		='$res_address' 
	WHERE res_email	='$res_email'
";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "New record Inserted successfully";
	header("Location: restaurantpage.php");
} else {
	echo "Error : Input";
	header("Location: restaurant_updateFORM.php");
}

mysqli_close($conn); // ปิดฐานข้อมูล

?>