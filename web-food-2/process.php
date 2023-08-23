<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);


$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);


$type = $data['type_ID']; 
$email = $data['email'];



//array in php
$arr = array();


if ($type == "type_0001") {
  $sql = "SELECT * FROM food WHERE res_email = '$email'";
} else {
  $sql = "SELECT * FROM food WHERE res_email = '$email' AND type_ID = '$type'";
}

$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

while ($row = mysqli_fetch_assoc($res)) {
  $food_picture = $row['food_picture'];
  $food_ID = $row['food_ID'];
  $food_name = $row['food_name'];
  $food_detail = $row['food_detail'];
  $price = $row['food_price'];
  $type_ID = $row['type_ID'];
  $res_email = $row['res_email'];
//put data to arr
$food_price = number_format($price,2,".",",");
  $arr[] = array(
    'food_picture' => $food_picture,
    'food_name' => $food_name,
    'food_detail' => $food_detail,
    'food_price' => $food_price,
    'type_ID' => $type_ID,
    'res_email' => $res_email,
    'food_ID' => $food_ID


  
  );
}

echo json_encode($arr);


?>