<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

$sql = '
	SELECT * 
	FROM employee 
	WHERE Salary > 100000;
	';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo mysqli_num_rows($result);
} else {
	echo "EMPTY DATA";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>