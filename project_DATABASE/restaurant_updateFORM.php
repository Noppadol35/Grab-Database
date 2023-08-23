<?php require('connect.php'); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>แก้ไขข้อมูลร้านค้า</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/restaurant_updateform.css">

</head>

<body>

<!-- < ?php
        
        $res_email         = $_REQUEST['res_email '];
        
?> -->

    <section class="section">
        <a class="backto" href="restaurantpage.php"><i class="fa-solid fa-chevron-left"></i>&nbsp;กลับหน้าร้าน</a>
            <div class="container">
                <form action="restaurant_update.php?res_email=<?php echo $res_email; ?>" method="post" name="restaurant">
                    <table class="tbl-30">
                        <tr> <td> <td><h2>แก้ไขข้อมูลร้านค้า</h2></td> </td> </tr>

                            <tr>
                                <td>รูปภาพปกร้านค้า:</td>
                                <td>
                                    <input type="file" name="res_picture">
                                </td>
                            </tr>

                            <tr>
                                <td>ชื่อร้านค้า:</td>
                                <td>
                                    <input type="text" name="res_name" placeholder="ชื่อร้านค้า">
                                </td>
                            </tr>    

                            <tr>
                                <td>รหัสผ่าน:</td>
                                <td>
                                    <input type="text" name="res_password" placeholder="ใส่รหัสผ่านใหม่ หากต้องการเปลี่ยน">
                                </td>
                            </tr>   

                            <tr>
                                <td>อีเมล์ร้านค้า :</td>
                                <td>
                                <input type="text" name="res_email">
                                </td>
                            <!-- </tr>   <input type="text" name="res_email" value=" < ?php echo $res_email; ?>" disabled> -->

                            <tr>
                                <td>res_open_status:</td>
                                <td>
                                    <input type="radio" name="res_open_status" value="open"> Open
                                    <input type="radio" name="res_open_status" value="close"> Close
                                </td>
                            </tr>   

                            <tr>
                                <td>res_tel:</td>
                                <td>
                                    <input type="text" name="res_tel"placeholder="เบอร์โทรศํพท์ร้านค้า">
                                </td>
                            </tr>

                            <tr>
                                <td>res_detail:</td>
                                <td>
                                    <input type="text" name="res_detail"placeholder="รายละเอียดร้านค้า">
                                </td>
                            </tr>   

                            <tr>
                                <td>res_address:</td>
                                <td>
                                    <input type="text" name="res_address"placeholder="ที่อยู่ร้านค้า">
                                </td>
                            </tr>

                            <tr>
                                <td><td>
                                    <input type="submit" name="submit" value="ยืนยัน">
                                </td></td>
                            </tr>

                    </table>
                </form>

                <?php
                
                    if(isset($_POST['submit']))
                    {
                        if(isset($_POST['res_open_status']))
                        {
                            $res_open_status = $_POST['res_open_status'];
                        }
                        else
                        {
                            $res_open_status = "Close";
                        }
                    }

                ?>
            </div>
        
        </section>
    </body>
</html>

<?php
    mysqli_close($conn); // ปิดฐานข้อมูล
?>