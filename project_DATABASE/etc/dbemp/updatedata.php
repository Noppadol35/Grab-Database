<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

$update_ID    = $_REQUEST['EmployeeID'];
$EmployeeID   = $update_ID;
$Title		  = $_REQUEST['Title'];
$Name		  = $_REQUEST['Name'];
$Sex		  = $_REQUEST['Sex'];
$Education	  = $_REQUEST['Education'];
$Start_Date	  = $_REQUEST['Start_Date'];
$Salary		  = $_REQUEST['Salary'];
$DepartmentID = $_REQUEST['DepartmentID'];

$sql = "
	UPDATE employee
	SET Title = '" . $Title . "',  
	Name = '" . $Name . "', 
	Sex = '" . $Sex . "', 
	Education = '" . $Education . "', 
	Start_Date = '" . $Start_Date . "', 
	Salary = '" . $Salary . "', 
	DepartmentID = '" . $DepartmentID . "' 
	WHERE EmployeeID = " . $EmployeeID . " ; ";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "Record " . $update_ID . " was Updated.";
} else {
	echo "Error : Update";
}
mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>