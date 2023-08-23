<?php require('connect.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>แก้ไขอาหาร & ลบอาหาร</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="css/edit&deleteform.css">

</head>
<body>

<?php
  
  $sql = '
    SELECT * 
    FROM food;
    ';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>

  <section class="section">
        <a class="backto" href="restaurantpage.php"><i class="fa-solid fa-chevron-left"></i>&nbsp;กลับหน้าร้าน</a>
        <br><br>
        <div class="container">
          <div style="overflow-x:auto;">
            <table .tbl-full >
              <tr>
                <th width="200">
                  <div align="center">food_picture</div>
                </th>
                <th width="150">
                  <div align="center">No</div>
                </th>
                <th width="200">
                  <div align="center">food_ID</div>
                </th>
                <th width="200">
                  <div align="center">food_name</div>
                </th>
                <th width="400">
                  <div align="center">food_detail</div>
                </th>
                
                <th width="200">
                  <div align="center">food_price</div>
                </th>
                <th width="200">
                  <div align="center">food_amount</div>
                </th>
                <th width="200">
                  <div align="center">type_ID</div>
                </th>
                <th width="200">
                  <div align="center">res_email</div>
                </th>
                <th width="150">
                  <div align="center">Delete</div>
                </th>
                <th width="150">
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
                  <td><?php echo $objResult["food_ID"]; ?></td>
                  <td><?php echo $objResult["food_name"]; ?></td>
                  <td><?php echo $objResult["food_detail"]; ?></td>
                  <td><?php echo $objResult["food_picture"]; ?></td>
                  <td><?php echo $objResult["food_price"]; ?></td>
                  <td><?php echo $objResult["food_amount"]; ?></td>
                  <td><?php echo $objResult["type_ID"]; ?></td>
                  <td><?php echo $objResult["res_email"]; ?></td>
                  <td><a class="deletebutton"  href="deletefood.php?food_ID=<?php echo $objResult["food_ID"]; ?>">Delete</a></td>
                  <td><a class="editbutton" href="editfoodFORM.php?food_ID=<?php echo $objResult["food_ID"]; ?>">Update</a></td>
                </tr>
              
              <?php
                $i++;
              }
              ?>
            </table>
          </div>
    </div>
</section>

<?php

  mysqli_close($conn);

?>

</body>
</html>