<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php

$servername = 'localhost';
$username = 'root';
$password = '0868681682';
$dbname = 'dbemp';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection : failed (เชื่อมต่อฐานข้อมูล ไม่ สำเร็จ)" . mysqli_connect_error());
} else {
	echo "Connection : OK (เชื่อมต่อฐานข้อมูลสำเร็จ)";
}

mysqli_close($conn); // ปิดฐานข้อมูล
?>