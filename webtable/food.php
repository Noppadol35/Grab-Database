<!DOCTYPE html>
<html dir="ltr" lang="en">

<!--- js ---->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<!-- databoot -->
<?php
// Load the library
require 'paginator.php';

// Connect to the database
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:/Grab_login.php');
}
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

// Set the number of records to display per page
$recordsPerPage = 5;

// Get the current page from the query string, or set to 1 if not present
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $recordsPerPage;

// Get the total number of records in the table
$totalRecords = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM food"))[0];

// Create the pagination object
$paginator = new Paginator($totalRecords, $recordsPerPage, $page, 'page=');

// Construct the SQL query
$sql = "SELECT * FROM food LIMIT $offset, $recordsPerPage";

// Execute the query and get the result set
$result = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/Grab_logo/Grab_logo_resize.png">
    <title>GrabFood</title>
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="assets/images/Grab_logo/Grab_logo_resize.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/Grab_logo/Grab_logo_resize.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="assets/images/Grab_logo/Grab_logo_name_resize.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="assets/images/Grab_logo/Grab_logo_name_resize.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/Grab_logo/Grab_logo_resize.png" alt="user" class="rounded-circle" width="40">




                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">
                                        <?php
                                        $cus_email = $_SESSION['user_name'];

                                        $selectt = " SELECT * FROM cus WHERE cus_email = '$cus_email' ";

                                        $resultt = mysqli_query($conn, $selectt);
                                        $row = mysqli_fetch_array($resultt);
                                        ?>

                                        <?php echo $row['cus_name']; ?>
                                    </span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout.php"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><span class="hide-menu">Consumer</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="consumer.php" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">Consumer
                                    profile</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="cart.php" aria-expanded="false"><i class="icon-basket"></i><span class="hide-menu">Cart</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Driver</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="rider.php" aria-expanded="false"><i class="fa-solid fa-motorcycle"></i><span class="hide-menu">Rider
                                    profile</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Merchant</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="restaurant.php" aria-expanded="false"><i class="bi bi-shop"></i><span class="hide-menu">Restaurant</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="food_order.php" aria-expanded="false"><i class="bi bi-receipt"></i><span class="hide-menu">Food order
                                </span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="fa-solid fa-bowl-food"></i><span class="hide-menu">Food
                                </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="food_type.php" class="sidebar-link"><span class="hide-menu"> Food category
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="food.php" class="sidebar-link"><span class="hide-menu"> Food
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning
                            <?php echo $row['cus_name']; ?>
                        </h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Food</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <style>
                th {
                    width: 100px;
                    /* กำหนดความกว้างของคอลัมเป็น 100px */
                }
            </style>

            <div class="container-fluid">
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Food</h4>
                                    <div class="ml-auto">
                                        <div class="dropdown sub-dropdown">
                                            <a href="#" class="btn waves-effect waves-light btn-rounded btn btn-success" style="float:right;" onclick="insertData()">Add</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">No</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Food
                                                    Picture
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Food
                                                    ID
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Name
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Detail
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                                    Price
                                                </th>

                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Type
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                                    Restaurant
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Edit
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Remove
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <?php
                                            $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                                            $i = 1;


                                            while ($objResult = mysqli_fetch_array($objQuery)) {
                                                $res_check_email = $objResult["res_email"];
                                                $sql_res = "SELECT * FROM restaurant WHERE res_email = '$res_check_email'";
                                                $query_res = mysqli_query($conn, $sql_res);
                                                $res_result = mysqli_fetch_array($query_res);
                                                $res_name = $res_result['res_name'];
                                            ?>

                                                <tr style="vertical-align: top;">
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <div align="center">
                                                            <?php echo $i; ?>
                                                        </div>
                                                    </td>


                                                    <td class="font-weight-medium text-dark border-top-0 px-2 py-4">
                                                        <img alt="" style="width: 10rem; background-color: #cfcecc;
                                                         display: inline-flex;
                                                    align-items: center; border-radius: 10% !important" src="<?php echo 'uploads/' . $objResult["food_picture"]; ?>" class="rounded-circle">
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_ID"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_name"]; ?>
                                                    </td>

                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <p style="white-space: pre-line;">
                                                            <?php
                                                            $food_detail = $objResult["food_detail"];
                                                            $max_length = 45; // จำนวนตัวอักษรสูงสุดที่ต้องการแสดง
                                                            if (mb_strlen($food_detail) > $max_length) {
                                                                $food_detail_short = mb_substr($food_detail, 0, $max_length, 'UTF-8'); // ตัดข้อความและเพิ่ม ... ไปท้าย
                                                                echo $food_detail_short . '<br>'; // แสดงผลข้อความที่ถูกตัดแล้ว
                                                                echo mb_substr($food_detail, $max_length, null, 'UTF-8') . '<br>'; // แสดงผลข้อความที่ตัดแล้วในบรรทัดถัดไป
                                                            } else {
                                                                echo $food_detail . '<br>'; // แสดงผลข้อความทั้งหมด
                                                            }
                                                            ?>
                                                        </p>

                                                    </td>


                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo number_format($objResult["food_price"], 2, ".", ","); ?> ฿
                                                    </td>
                                                    <?php
                                                    $type_ID = $objResult['type_ID'];
                                                    $sqltype = "SELECT * FROM food_type WHERE type_ID = '$type_ID'";
                                                    $restype = mysqli_query($conn, $sqltype);
                                                    $rowtype = mysqli_fetch_assoc($restype);
                                                    $type_name = $rowtype['type_name']; ?>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $type_name; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $res_name; ?>
                                                    </td>


                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="updataedata.php" method="post">

                                                                <a href="#" class="btn btn-warning btn-rounded" onclick="editData('<?php echo $objResult['food_picture'] ?>','<?php echo $objResult['food_ID'] ?>','<?php echo $objResult['food_name'] ?>','<?php echo $objResult['food_detail'] ?>','<?php echo $objResult['food_price'] ?>','<?php echo $type_name ?>','<?php echo $res_name ?>')">Edit</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-medium text-dark px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="deletedata.php" method="post">
                                                                <a href="#" class="btn waves-effect waves-light btn-rounded btn-danger delete-food" data-food="<?php echo $objResult["food_ID"]; ?>">Remove</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <style>
                                        .pagination-green .page-link {
                                            color: #28a745;
                                            border-color: #28a745;
                                        }

                                        .pagination-green .page-link:hover {
                                            color: #fff;
                                            background-color: #28a745;
                                            border-color: #28a745;
                                        }

                                        .pagination-green .page-link:focus {
                                            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
                                        }

                                        .pagination-green .page-item.active .page-link {
                                            z-index: 3;
                                            color: #fff;
                                            background-color: #28a745;
                                            border-color: #28a745;
                                        }
                                    </style>
                                    <nav aria-label="...">
                                        <ul class="pagination pagination-green justify-content-end">
                                            <?php foreach ($paginator->getPages() as $page) : ?>
                                                <?php if ($page['url']) : ?>
                                                    <li class="page-item <?php echo $page['isCurrent'] ? 'active' : ''; ?>">
                                                        <a class="page-link pagination-green" href="?page=<?php echo $page['num']; ?>">
                                                            <?php echo $page['num']; ?>
                                                            <?php if ($page['isCurrent']) : ?>
                                                                <span class="sr-only">(current)</span>
                                                            <?php endif; ?>
                                                        </a>
                                                    </li>
                                                <?php else : ?>
                                                    <li class="page-item disabled">
                                                        <span class="page-link"><?php echo $page['num']; ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                <!-- All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>. -->
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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

    <style>
        .form-group {
            text-align: left;
        }

        label {
            margin-right: 1rem;
        }
    </style>


    <script>
        function showPreview(event) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            };
        }


        // ===================================================================== Insert data =====================================================================
        function insertData() {
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

            //-----------restaurant----------------
            //-----------restaurant----------------
            //-----------restaurant----------------

            var foodTypeOptionsR = "";
            var foodTypeSelectedR = "";
            var res_name = res_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-res-name.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var res = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < res.length; i++) {
                        var optionValueR = res[i].res_email;
                        var optionTextR = res[i].res_name;
                        if (optionTextR === res_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedR = optionValueR;
                        }
                        foodTypeOptionsR += '<option value="' + optionValueR + '">' + optionTextR + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#res_name').html(foodTypeOptionsR);
                    // set the selected option to the foodTypeSelected variable
                    $('#res_name').val(foodTypeSelectedR);
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

            //-----------restaurant----------------
            //-----------restaurant----------------
            //-----------restaurant----------------
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
                    '<select class="form-control" id="res_name">' +
                    foodTypeOptionsR +
                    '</select>' +
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
                        url: 'insert-data-food.php',
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

        // ===================================================================== Update data =====================================================================


        function editData(food_picture, food_ID, food_name, food_detail, food_price, type_name, res_name) {

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

            //-----------restaurant----------------
            //-----------restaurant----------------
            //-----------restaurant----------------

            var foodTypeOptionsR = "";
            var foodTypeSelectedR = "";
            var res_name = res_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-res-name.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var res = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < res.length; i++) {
                        var optionValueR = res[i].res_email;
                        var optionTextR = res[i].res_name;
                        if (optionTextR === res_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedR = optionValueR;
                        }
                        foodTypeOptionsR += '<option value="' + optionValueR + '">' + optionTextR + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#res_name').html(foodTypeOptionsR);
                    // set the selected option to the foodTypeSelected variable
                    $('#res_name').val(foodTypeSelectedR);
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

            //-----------restaurant----------------
            //-----------restaurant----------------
            //-----------restaurant----------------

            console.log(food_picture, food_ID, food_name, food_detail, food_price);
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
                    '<select class="form-control" id="res_name">' +
                    foodTypeOptionsR +
                    '</select>' +
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
                        url: 'update-data-food.php',
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
                            url: 'delete-data-food.php',
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
    </script>

</body>

</html>