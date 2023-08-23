<html>

<head></head>

<body>
  <?php
  require('connect.php');

  $sql = '
    SELECT * 
    FROM food;
    ';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1">
    <tr>
      <th width="50">
        <div align="center">No</div>
      </th>
      <th width="100">
        <div align="center">EmployeeID</div>
      </th>
      <th width="100">
        <div align="center">Title</div>
      </th>
      <th width="100">
        <div align="center">Name</div>
      </th>
      <th width="100">
        <div align="center">Sex</div>
      </th>
      <th width="100">
        <div align="center">Education</div>
      </th>
      <th width="100">
        <div align="center">Start_Date</div>
      </th>
      <th width="100">
        <div align="center">Salary</div>
      </th>
      <th width="100">
        <div align="center">DepartmentID</div>
      </th>
      <th width="100">
        <div align="center">Delete</div>
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
        <td><?php echo $objResult["EmployeeID"]; ?></td>
        <td><?php echo $objResult["Title"]; ?></td>
        <td><?php echo $objResult["Name"]; ?></td>
        <td><?php echo $objResult["Sex"]; ?></td>
        <td><?php echo $objResult["Education"]; ?></td>
        <td><?php echo $objResult["Start_Date"]; ?></td>
        <td><?php echo $objResult["Salary"]; ?></td>
        <td><?php echo $objResult["DepartmentID"]; ?></td>
        <td align="center"><a href="deletedata.php?EmployeeID=<?php echo $objResult["EmployeeID"]; ?>">Delete</a></td>
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