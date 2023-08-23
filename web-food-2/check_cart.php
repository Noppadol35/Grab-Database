<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

$conn = mysqli_connect($servername, $username, $password, $dbname);


$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);



$email = $data['email'];



//array in php
$arr = array();



  $sql = "SELECT * FROM cart WHERE cus_email = '$email' AND status = '0'";


$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

while ($row = mysqli_fetch_assoc($res)) {
  $food_ID = $row['food_ID'];
  $food_amount = $row['food_amount'];
  $res_email = $row['res_email'];
//put data to arr
  $arr[] = array(




    'food_amount' => $food_amount,
    'res_email' => $res_email,
    'food_ID' => $food_ID


  
  );
}

echo json_encode($arr);


?>