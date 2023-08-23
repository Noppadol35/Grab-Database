<?php
    $order_ID = $_POST['order_ID'];
    $rider_email = $_POST['rider_email'];


    $order_status = 2;
    
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'grab';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    $sql_add = "INSERT INTO rider_order (rider_order_ID,order_ID, rider_email) VALUES ('','$order_ID', '$rider_email')";
    $result = mysqli_query($conn, $sql_add);

    $sql = "UPDATE food_order SET order_status='กำลังจัดส่ง' WHERE order_ID='$order_ID'";
    
    $result = mysqli_query($conn, $sql);
    
    $stmt = $conn->prepare("UPDATE food_order SET order_status=? WHERE order_ID=?");
    $stmt->bind_param("ss", $order_status, $order_ID);
    $stmt->execute();


?>