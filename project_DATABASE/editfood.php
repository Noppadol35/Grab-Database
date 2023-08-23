<?php
require('connect.php');

$food_picture 			= $_FILES['food_picture']['name'];
$food_ID 				= $_REQUEST['food_ID'];
$food_name 				= $_REQUEST['food_name'];
$food_detail 			= $_REQUEST['food_detail'];
$food_price 			= $_REQUEST['food_price'];
$type_ID 				= $_REQUEST['type_ID'];
$res_email 				= $_REQUEST['res_email'];


$sql = "
	UPDATE food
	SET food_picture 	= '$food_picture',
		food_ID 		= '$food_ID',
		food_name 		= '$food_name',
		food_detail 	= '$food_detail',
		food_price		= '$food_price',
		type_ID 		= '$type_ID',
	WHERE food_ID 		= '$food_ID'
	";



$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "Record " . $update_ID . " was Updated.";
	header("Location: restaurantpage.php");
} else {
	echo "Error : Update";
	header("Location: edit&deletefoodFORM.php");
}
mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>


