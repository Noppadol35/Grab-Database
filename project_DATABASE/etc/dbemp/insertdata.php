<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

$EmployeeID   = $_REQUEST['EmployeeID'];
$Title		  = $_REQUEST['Title'];
$Name		  = $_REQUEST['Name'];
$Sex		  = $_REQUEST['Sex'];
$Education	  = $_REQUEST['Education'];
$Start_Date	  = $_REQUEST['Start_Date'];
$Salary		  = $_REQUEST['Salary'];
$DepartmentID = $_REQUEST['DepartmentID'];

$sql = "
	INSERT INTO employee
	VALUES ('$EmployeeID','$Title','$Name','$Sex','$Education','$Start_Date','$Salary','$DepartmentID');
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "New record Inserted successfully";
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>