<?php

$delete_ID  = $_REQUEST['food_ID'];

require('connect.php');

$sql = '
    DELETE FROM food
    WHERE food_ID = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    echo "Record " . $delete_ID . " was Deleted.";
    // header("Location: edit&deletefoodFORM.php");
} else {
    echo "Error : Delete";
    // header("Location: edit&deletefoodFORM.php");
}

mysqli_close($conn); // ปิดฐานข้อมูล

?>