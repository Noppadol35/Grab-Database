<?php

session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:/Grab_login.php');
} else {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'grab';


    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_set_charset($conn, "utf8");
    $res_email = $_SESSION['user_name'];

    $selectt = " SELECT * FROM restaurant WHERE res_email = '$res_email' ";
    $resultt = mysqli_query($conn, $selectt);
    $row = mysqli_fetch_array($resultt);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/Grab_logo/Grab_logo_resize.png">
    <title>GrabFood</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/restaurantpagess.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--- js ---->

</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <nav>
                <ul class="menu">
                    <li class="logo"><a href="#"><img src="img/GrabFood-logo.png"></a></li>
                    &nbsp;&nbsp;&nbsp;<a class="item button second" href="/Store_notifications/Store_notifications.php?res_email=<?php echo $res_email; ?>"><i class="fa-solid fa-list-ul"></i>&nbsp; Order List</a></li>
                    <a class="item button second" href="#" rel="noopener noreferrer" onclick="editData_res('<?php echo $row['res_picture'] ?>','<?php echo $row['res_name'] ?>', '<?php echo $row['res_email'] ?>', '<?php echo $row['res_password'] ?>','<?php echo $row['res_open_status'] ?>' ,'<?php echo $row['res_tel'] ?>','<?php echo $row['res_detail'] ?>','<?php echo $row['res_address'] ?>')"><i class="fa-solid fa-shop"></i>&nbsp; แก้ไขข้อมูลร้านค้า</a>
                    &nbsp;&nbsp;&nbsp;<a class="item button third" href="/logout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</a></li>
                    <li class="toggle"><a href="#"><i class="fa-solid fa-bars"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="column side" style="background-color:#aaa;">
            <img src="<?php echo '/webtable/uploads/' . $row["res_picture"]; ?>" width="320px" alt="banner" class="banner">
        </div>
        <div class="column middle" style="background-color:#bbb;">
            <div class="res_name"><?php echo $row["res_name"]; ?></div>
            <div class="res_detail"><?php echo $row["res_detail"]; ?></div>
        </div>
        <div class="column side" style="background-color:#ccc;">
            <div class="res_open_status">Status : <?php echo $row["res_open_status"];  ?>
            </div>
            <div class="res_tel">Tel : <?php echo $row["res_tel"];  ?>
            </div>
        </div>
    </div>

    <?php
    $sql = "SELECT * FROM food";
    $res = mysqli_query($conn, $sql);
    ?>

    <ul class="food">
        <li id="add-food"><a class="addfoodbutton" onclick="insertData('<?php echo $res_email ?>')" href="#" rel="noopener noreferrer"><i class="fa-solid fa-plus"></i>&nbsp;เพิ่มอาหาร</a></li>
        <!-- <li id="edit-food"><a href="edit&deletefoodFORM.php" rel="noopener noreferrer"><i class="fa-solid fa-pen-to-square"></i>&nbsp;แก้ไขอาหาร / <i class="fa-solid fa-trash"></i>&nbsp;ลบอาหาร</a></li> -->
    </ul>
    <!-- เผื่ออยากทำ popup target="popup" onclick="window.open('editfood.php','edit','width=1000,height=800')" -->


    <div style="overflow-x:auto;">
        <table class="tbl-full">
            <tr>
                <th width="100">No</th>
                <th width="140">food_picture</th>
            
                <th width="100">food_name</th>
                <th width="150">food_detail</th>
                <th width="100">food_price</th>
             
                <th width="100">type</th>
                <th width="100">แก้ไข</th>
                <th width="100">ลบ</th>
                <!-- <th>res_email</th> -->
            </tr>

            <?php
            $sql = "SELECT * FROM food WHERE res_email = '$res_email'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $i = 1;

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $food_picture = $row['food_picture'];
                    $food_ID = $row['food_ID'];
                    $food_name = $row['food_name'];
                    $food_detail = $row['food_detail'];
                    $food_price = $row['food_price'];
            
                    $type_ID = $row['type_ID'];
                    $res_email = $row['res_email'];

            ?>

                    <tr>
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td class="font-weight-medium text-dark border-top-0 px-2 py-4">
                            <img alt="" style="margin-top:1rem; width: 7rem; background-color: #cfcecc;
                                                         display: inline-flex;
    align-items: center; border-radius: 10% !important" src="<?php echo '/webtable/uploads/' . $food_picture; ?>" class="rounded-circle">
                        </td>
                        
                        <td><?php echo $food_name; ?></td>
                        <td><?php echo $food_detail; ?></td>
                        <td><?php echo number_format($food_price,2,".",","); ?></td>
                   
                        <?php
                        $sqltype = "SELECT * FROM food_type WHERE type_ID = '$type_ID'";
                        $restype = mysqli_query($conn, $sqltype);
                        $rowtype = mysqli_fetch_assoc($restype);
                        $type_name = $rowtype['type_name']; ?>
                        <td><?php echo $type_name; ?></td>
                        <td>
                            <a href="#" class="editbutton" onclick="editData('<?php echo $food_picture ?>','<?php echo $food_ID ?>','<?php echo $food_name ?>','<?php echo $food_detail ?>','<?php echo $food_price ?>','<?php echo $type_name ?>','<?php echo $res_email ?>')"> Edit</a>
                        </td>
                        <td>
                            <a href="#" class="deletebutton delete-food" data-food="<?php echo $food_ID; ?>">Remove</a>
                        </td>
                        <!-- <td>< ?php echo $res_email; ?></td> -->
                    </tr>


            <?php
                }
            } else {
                echo "<tr> <td colspan='9'> ยังไม่มีอาหารในร้านนี้ </td> </tr>";
            }

            ?>


        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="script.js"></script>
</body>

<style>
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
    }

    label {
        font-weight: bold;
        margin-bottom: 0.5rem;
        text-align: left;
    }

    input[type="file"] {
        margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="date"],
    input[type="select"],
    select,
    textarea {
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        font-size: 1rem;
    }

    input[type="submit"] {
        background-color: #10ae68;
        color: white;
        border: none;
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0e995f;
    }

    #preview {
        max-width: 100%;
        margin-bottom: 1rem;
    }
</style>

<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="dist/js/app-style-switcher.js"></script>
<script src="dist/js/feather.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="assets/extra-libs/c3/d3.min.js"></script>
<script src="assets/extra-libs/c3/c3.min.js"></script>
<script src="assets/libs/chartist/dist/chartist.min.js"></script>
<script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="dist/js/pages/dashboards/dashboard1.min.js"></script>
<script>
    function showPreview(event) {
        var output = document.getElementById('preview');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        };
    }

     // ===================================================================== Insert data =====================================================================
     function insertData(res_email) {
        // รับค่าจากฟอร์ม
        var res_email = res_email;
            var foodTypeOptions = "";

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-food-type.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var foodTypes = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < foodTypes.length; i++) {
                        foodTypeOptions += '<option value="' + foodTypes[i].type_ID + '">' + foodTypes[i]
                            .type_name + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#type_ID').html(foodTypeOptions);
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to get food type options.',
                        icon: 'error',
                        confirmButtonColor: '#d33'
                    });
                }
            });

            
            // Display a pop-up window with a form for inserting the data
            Swal.fire({
                title: 'Insert Data',
                html: '<form id="insert-form" class="form" enctype="multipart/form-data">' +

                    '<div class="form-group">' +
                    '<label for="food_picture" class="label font-weight-medium text-dark">Picture :</label>' +
                    '<input type="file" id="food_picture" name="food_picture" class="form-control" onchange="showPreview(event)">' +
                    '<div class="form-group">' +
                    '<br><img id="preview" style="max-width:100%;" >' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="food_name" class="label font-weight-medium text-dark">Food Name :</label>' +
                    '<input type="text" id="food_name" name="food_name" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_detail" class="label font-weight-medium text-dark">Food Detail :</label>' +
                    '<textarea id="food_detail" name="food_detail" class="form-control"></textarea>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_price" class="label font-weight-medium text-dark">Food Price :</label>' +
                    '<input type="number" id="food_price" name="food_price" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="type_ID" class="label font-weight-medium text-dark">Food Type :</label>' +
                    '<select id="type_ID" name="type_ID" class="form-control">' +
                    foodTypeOptions +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="res_name">Restaurant</label>' +
                    '<input type="text" id="res_name" name="res_name" value="' + res_email + '" class="form-control" disabled>' +
                    
                    '</div>' +
                    '</form>',

                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                confirmButtonColor: '#10ae68',
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show a success message
                    var formData = new FormData();

                    formData.append('food_picture', $('#food_picture')[0].files[0]);
                    formData.append('food_ID', $('').val());
                    formData.append('food_name', $('#food_name').val());
                    formData.append('food_detail', $('#food_detail').val());
                    formData.append('food_price', $('#food_price').val());
                    formData.append('food_amount', $('#food_amount').val());
                    formData.append('type_ID', $('#type_ID').val());
                    formData.append('res_name', $('#res_name').val());


                    $.ajax({
                        type: 'POST',
                        url: '/webtable/insert-data-food.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Data has been saved successfully.',
                                icon: 'success',
                                confirmButtonColor: '#10ae68'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to save data.',
                                icon: 'error',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
            // Add event listener to check if the input value is an integerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
        }


    // Function for editing the data ---------------------------------------
     // Function for editing the data ---------------------------------------
      // Function for editing the data ---------------------------------------
       // Function for editing the data ---------------------------------------
        // Function for editing the data ---------------------------------------

    function editData(food_picture, food_ID, food_name, food_detail, food_price, type_name, res_email) {

        console.log(food_picture, food_ID, food_name, food_detail, food_price, type_name, res_email);
        console.log("type_name : " + type_name);
        var foodTypeOptions = "";
        var foodTypeSelected = "";
        var type_name = type_name;

        // ดึงข้อมูลจากฐานข้อมูล
        $.ajax({
    type: 'POST',
    url: '/get-food-type.php',
    success: function(data) {
        // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
        var foodTypes = JSON.parse(data);
        // วนลูปเพื่อสร้าง options ของ dropdown
        for (var i = 0; i < foodTypes.length; i++) {

            var optionValue = foodTypes[i].type_ID;
            var optionText = foodTypes[i].type_name;
            if (optionText === type_name) {
                // if the current optionText matches the type_name variable,
                // set the foodTypeSelected variable to the current optionValue
                foodTypeSelected = optionValue;
            }
            foodTypeOptions += '<option value="' + optionValue + '">' + optionText + '</option>';
        }
        // แทรก options ใน dropdown
        $('#type_ID').html(foodTypeOptions);
        // set the selected option to the foodTypeSelected variable
        $('#type_ID').val(foodTypeSelected);
    },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to get food type options.',
                    icon: 'error',
                    confirmButtonColor: '#d33'
                });
            }
        });

        // Display a pop-up window with a form for editing the data
        Swal.fire({
                title: 'Edit Data',
                html: '<form id="insert-form" class="form" enctype="multipart/form-data">' +
                    '<div class="form-group">' +
                    '<label for="food_picture" class="label font-weight-medium text-dark">Picture :</label>' +
                    '<input type="file" id="food_picture" name="food_picture" class="form-control" onchange="showPreview(event)">' +
                    '<div class="form-group">' +
                    '<br><img src="/webtable/uploads/' + food_picture + '" id="preview" style="max-width:100%;" >' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_ID" class="label font-weight-medium text-dark">ID :</label>' +
                    '<input type="text" id="food_ID" name="food_ID" value="' + food_ID +
                    '" class="form-control" disabled>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_name" class="label font-weight-medium text-dark">Name :</label>' +
                    '<input type="text" id="food_name" name="food_name" value="' + food_name +
                    '" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_detail" class="label font-weight-medium text-dark">Detail :</label>' +
                    '<textarea id="food_detail" name="food_detail" class="form-control">' + food_detail +
                    '</textarea>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_price" class="label font-weight-medium text-dark">Price :</label>' +
                    '<input type="number" id="food_price" name="food_price" value="' + food_price +
                    '" class="form-control">' +
                    '</div>' +



                    '<div class="form-group">' +
                    '<label for="type_ID" class="label font-weight-medium text-dark">Food Type :</label>' +
                    '<select id="type_ID" name="type_ID" class="form-control">' +
                    foodTypeOptions +
                    '</select>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="res_name">Restaurant</label>' +
                    '<input type="text" id="res_name" name="res_name" value="' + res_email + '" class="form-control" disabled>' +
                    
                    '</div>' +
                    '</form>',
                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                confirmButtonColor: '#10ae68',


                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();

                    var fileInput = $('#food_picture')[0];

                    if (fileInput.files.length > 0) {
                        console.log("มีรูป");
                        formData.append('food_picture', fileInput.files[0]);
                    } else {
                        console.log("ไม่มีรูป");
                    }
                    formData.append('food_ID', $('#food_ID').val());
                    formData.append('food_name', $('#food_name').val());
                    formData.append('food_detail', $('#food_detail').val());
                    formData.append('food_price', $('#food_price').val());

                    formData.append('type_ID', $('#type_ID').val());
                    formData.append('res_name', $('#res_name').val());


                    $.ajax({
                        type: 'POST',
                        url: '/webtable/update-data-food.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Data has been saved successfully.',
                                icon: 'success',
                                confirmButtonColor: '#10ae68'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();

                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to save data.',
                                icon: 'error',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });



                }

            });
        

    }



    // ===================================================================== delete data =====================================================================
    $(document).ready(function() {
        $('.delete-food').click(function() {
            var res = $(this).data('food');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You want to delete ' + res + ' record!',
                showCancelButton: true,
                confirmButtonColor: '#d33',

                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '/webtable/delete-data-food.php',
                        data: {
                            res: res
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'record deleted successfully.',
                                icon: 'success',
                                confirmButtonColor: '#10ae68'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            });
                        }
                    });
                }
            });
        });
    });

    function editData_res(res_picture, res_name, res_email, res_password, res_open_status, res_tel, res_detail, res_address) {

        console.log(res_picture);
        console.log(res_name);
        console.log(res_email);
        console.log(res_password);
        console.log(res_open_status);
        console.log(res_tel);
        console.log(res_detail);
        console.log(res_address);
        // Display a pop-up window with a form for editing the data
        Swal.fire({
            title: 'Edit Data',
            html: '<form id="insert-form" class="form" enctype="multipart/form-data">' +
                '<div class="form-group">' +
                '<label for="res_picture" class="label font-weight-medium text-dark">Picture :</label>' +
                '<input type="file" id="res_picture" name="res_picture" class="form-control" onchange="showPreview(event)">' +
                '<div class="form-group">' +
                '<br><img src="/webtable/uploads/' + res_picture + '" id="preview" style="max-width:100%;" >' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_name" class="label font-weight-medium text-dark">Name :</label>' +
                '<input type="text" id="res_name" name="res_name" value="' + res_name + '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_email" class="label font-weight-medium text-dark">Email :</label>' +
                '<input type="email" id="res_email" name="res_email" value="' + res_email +
                '" class="form-control" disabled>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_password" class="label font-weight-medium text-dark">Password:</label>' +
                '<input type="text" id="res_password" name="res_password" value="' + res_password +
                '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_open_status" class="label font-weight-medium text-dark">Open Status :</label>' +
                '<select id="res_open_status" name="res_open_status" class="form-control">' +
                `${res_open_status === 'Open' && "<option value='Open'>Open</option> <option value='Close'>Close</option>"}` +
                `${res_open_status === 'Close' && "<option value='Close'>Close</option> <option value='Open'>Open</option>"}` +
                '</select>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_tel" class="label font-weight-medium text-dark">Telephone :</label>' +
                '<input type="text" id="res_tel" name="res_tel" value="' + res_tel + '" class="form-control">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_detail" class="label font-weight-medium text-dark">Detail :</label>' +
                '<textarea id="res_detail" name="res_detail" class="form-control">' + res_detail + '</textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="res_address" class="label font-weight-medium text-dark">Address :</label>' +
                '<textarea id="res_address" name="res_address" class="form-control">' + res_address + '</textarea>' +
                '</div>' +
                '</form>',
            showCancelButton: true,
            confirmButtonText: 'Save',
            showLoaderOnConfirm: true,
            confirmButtonColor: '#10ae68',


            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();

                var fileInput = $('#res_picture')[0];

                if (fileInput.files.length > 0) {
                    console.log("มีรูป");
                    formData.append('res_picture', fileInput.files[0]);
                } else {
                    console.log("ไม่มีรูป");
                }
                formData.append('res_email', $('#res_email').val());
                formData.append('res_name', $('#res_name').val());
                formData.append('res_password', $('#res_password').val());
                formData.append('res_tel', $('#res_tel').val());
                formData.append('res_address', $('#res_address').val());
                formData.append('res_detail', $('#res_detail').val());
                formData.append('res_open_status', $('#res_open_status').val());

                $.ajax({
                    type: 'POST',
                    url: '/webtable/update-data-res.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data has been saved successfully.',
                            icon: 'success',
                            confirmButtonColor: '#10ae68'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();

                            }
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to save data.',
                            icon: 'error',
                            confirmButtonColor: '#d33'
                        });
                    }
                });



            }

        });
    }
</script>

</html>

<?php

mysqli_close($conn);

?>