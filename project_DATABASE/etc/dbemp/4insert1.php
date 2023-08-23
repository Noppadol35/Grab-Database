<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<html>

<head></head>

<body>
    <h2>Insert Data : Employee</h2>
    <form action="insertdata.php" method="post" name="Employee">
        <table border="1">
            <tr>
                <td>EmployeeID : </td>
                <td><input type="text" name="EmployeeID"></td>
            </tr>
            <tr>
                <td>Title : </td>
                <td><input type="text" name="Title"></td>
            </tr>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="Name"></td>
            </tr>
            <tr>
                <td>Sex : </td>
                <td><input type="text" name="Sex"></td>
            </tr>
            <tr>
                <td>Education : </td>
                <td><input type="text" name="Education"></td>
            </tr>
            <tr>
                <td>Start_Date : </td>
                <td><input type="text" name="Start_Date"></td>
            </tr>
            <tr>
                <td>Salary : </td>
                <td><input type="text" name="Salary"></td>
            </tr>
            <tr>
                <td>DepartmentID : </td>
                <td><input type="text" name="DepartmentID"></td>
            </tr>
        </table>

        <br>
        <input type="submit" value="Insert Data">
    </form>
</body>

</html>