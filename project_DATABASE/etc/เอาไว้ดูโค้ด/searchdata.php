<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<html>

<head></head>

<body>
  <?php
  $keyword  = $_REQUEST['keyword'];
  require('connect.php');

  $sql = "
    SELECT * 
    FROM restaurant
    WHERE Name LIKE '%" . $keyword . "%';
    ";

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1">
    <tr>
      <th width="50">
        <div align="center">No</div>
      </th>
      <th width="100">
        <div align="center">res_ID</div>
      </th>
      <th width="100">
        <div align="center">res_name</div>
      </th>
      <th width="100">
        <div align="center">res_username</div>
      </th>
      <th width="100">
        <div align="center">res_password</div>
      </th>
      <th width="100">
        <div align="center">res_open</div>
      </th>
      <th width="100">
        <div align="center">res_open_day</div>
      </th>
      <th width="100">
        <div align="center">res_tel</div>
      </th>
      <th width="100">
        <div align="center">res_createdate</div>
      </th>
      <th width="100">
        <div align="center">res_payment</div>
      </th>
      <th width="100">
        <div align="center">res_picture</div>
      </th>
      <th width="100">
        <div align="center">Update</div>
      </th>
    </tr>
    <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
      <tr>
        <td>
          <div align="center"><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["res_ID"]; ?></td>
        <td><?php echo $objResult["res_name	"]; ?></td>
        <td><?php echo $objResult["res_username"]; ?></td>
        <td><?php echo $objResult["res_password"]; ?></td>
        <td><?php echo $objResult["res_open"]; ?></td>
        <td><?php echo $objResult["res_open_day"]; ?></td>
        <td><?php echo $objResult["res_tel"]; ?></td>
        <td><?php echo $objResult["res_createdate"]; ?></td>
        <td><?php echo $objResult["res_payment"]; ?></td>
        <td><?php echo $objResult["res_picture"]; ?></td>
        <!-- <td align="center"><a href="deletedata.php?EmployeeID=<?php echo $objResult["EmployeeID"]; ?>">Delete</a></td>
        <td align="center"><a href="5update5.php?EmployeeID=<?php echo $objResult["EmployeeID"]; ?>">Update</a></td> -->
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  echo "<br><br>";
  echo "--- END ---";
  ?>
</body>

</html>