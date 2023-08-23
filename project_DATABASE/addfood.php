
<html>
<head>
	<style>
		.backto{
	color: green;
    background-color: #ffffff;
    padding: 10px;
    font-size: 15pt;
    border-radius: 25px;
    box-shadow: 2px 2px 13px 0px rgba(0, 0, 0, 0.31);
	text-decoration: none;
	}
	.backto:hover{
		background-color: #a9a7a7;
	}
	</style>
</head>
<body>
<?php
require('connect.php');

$food_picture 			= $_FILES['food_picture']['name'];
$food_ID 				= $_REQUEST['food_ID'];
$food_name 				= $_REQUEST['food_name'];
$food_detail 			= $_REQUEST['food_detail'];
$food_price 			= $_REQUEST['food_price'];
$food_amount 			= $_REQUEST['food_amount'];
$type_ID 				= $_REQUEST['type_ID'];
$res_email 				= $_REQUEST['res_email'];





// Upload the picture file to the server (optional)
if(isset($_FILES['food_picture']['name']))
{
	$food_picture = $_FILES['food_picture']['name'];

	if($food_picture!="")
	{
	$srs = $_FILES['food_picture']['tmp_name'];
	$dst = "/webtable/uploads/".$_FILES['food_picture']['name'];
	$upload = move_uploaded_file($srs, $dst);

		if($upload==false)
		{
			$_SESSION['upload'] = "Upload failed";
			header("Location: addfoodFORM.php");
			die();
		}
	}
}
else
{
	$food_picture = "";
}



// Insert the data into the database
$sql = "INSERT INTO food (food_picture, food_ID, food_name, food_detail, food_price, food_amount, type_ID, res_email) 
VALUES ('$food_picture', '$food_ID', '$food_name', '$food_detail', '$food_price', '$food_amount', '$type_ID', '$res_email')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
	header("Location: restaurantpage.php");
} else {
    echo "Error:";
}

// Close the database connection
$conn->close();
$st
?>
<br><br>
<a class="backto" href="addfoodFORM.php"><i class="fa-solid fa-chevron-left"></i>&nbsp;กลับหน้าเพิ่มอาหาร</a>

</body>
</html>