<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php

$delete_ID  = $_REQUEST['EmployeeID'];

require('connect.php');

$sql = '
    DELETE FROM employee
    WHERE EmployeeID = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    echo "Record " . $delete_ID . " was Deleted.";
} else {
    echo "Error : Delete";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>
