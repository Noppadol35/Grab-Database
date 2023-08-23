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
$totalRecords = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM food_order"))[0];

// Create the pagination object
$paginator = new Paginator($totalRecords, $recordsPerPage, $page, 'page=');

// Construct the SQL query
$sql = "SELECT * FROM food_order LIMIT $offset, $recordsPerPage";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" />

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
                            <?php echo $row['cus_name']; ?></h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Food order</a>
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
            <div class="container-fluid">
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Food Order</h4>
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
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">ID
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Product
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                                    Price</th>

                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Date
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Customer
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Restaurant
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Payment
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Status
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
                                                $cus_check_email = $objResult["cus_email"];
                                                $sql_cus = "SELECT * FROM cus WHERE cus_email = '$cus_check_email'";
                                                $query_cus = mysqli_query($conn, $sql_cus);
                                                $cus_result = mysqli_fetch_array($query_cus);
                                                $cus_name = $cus_result['cus_name'];

                                                $res_check_email = $objResult["res_email"];
                                                $sql_res = "SELECT * FROM restaurant WHERE res_email = '$res_check_email'";
                                                $query_res = mysqli_query($conn, $sql_res);
                                                $res_result = mysqli_fetch_array($query_res);
                                                $res_name = $res_result['res_name'];

                                                $pay_check = $objResult["pay_type"];
                                                $sql_pay = "SELECT * FROM payment WHERE payment_ID = '$pay_check'";
                                                $query_pay = mysqli_query($conn, $sql_pay);
                                                $pay_result = mysqli_fetch_array($query_pay);
                                                $pay_name = $pay_result['payment_name'];

                                                $status_check = $objResult["order_status"];
                                                $sql_status = "SELECT * FROM order_status WHERE order_status_ID = '$status_check'";
                                                $query_status = mysqli_query($conn, $sql_status);
                                                $status_result = mysqli_fetch_array($query_status);
                                                $status_name = $status_result['status_name'];



                                            ?>
                                                <tr>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <div align="center">
                                                            <?php echo $i; ?>
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["order_ID"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <p style="white-space: pre-line;">
                                                            <?php
                                                            $order_product = $objResult["order_product"];
                                                            $max_length = 150; // จำนวนตัวอักษรสูงสุดที่ต้องการแสดง
                                                            if (mb_strlen($order_product) > $max_length) {
                                                                $order_product_short = mb_substr($order_product, 0, $max_length, 'UTF-8'); // ตัดข้อความและเพิ่ม ... ไปท้าย
                                                                echo $order_product_short . '<br>'; // แสดงผลข้อความที่ถูกตัดแล้ว
                                                                echo mb_substr($order_product, $max_length, null, 'UTF-8') . '<br>'; // แสดงผลข้อความที่ตัดแล้วในบรรทัดถัดไป
                                                            } else {
                                                                echo $order_product . '<br>'; // แสดงผลข้อความทั้งหมด
                                                            }
                                                            ?>
                                                        </p>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo number_format($objResult["order_price"], 2, ".", ","); ?> ฿
                                                    </td>

                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["order_date"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $cus_name; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $res_name; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $pay_name; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $status_name; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="updataedata.php" method="post">
                                                                <a href="#" class="btn btn-warning btn-rounded" onclick="editData('<?php echo $objResult['order_ID'] ?>','<?php echo $objResult['order_product']; ?> ', '<?php echo $objResult['order_price']; ?>','<?php echo $objResult['order_date']; ?>','<?php echo $cus_name ?>','<?php echo $res_name ?>','<?php echo $pay_name ?>','<?php echo $status_name ?>')">Edit</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-medium text-dark px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="deletedata.php" method="post">
                                                                <a href="#" class="btn waves-effect waves-light btn-rounded btn-danger delete-res" data-order="<?php echo $objResult["order_ID"]; ?>">Remove</a>
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
        // ===================================================================== Insert data =====================================================================
        function insertData() {
            // Display a pop-up window with a form for inserting the data
            //-----------consumer----------------    
            //-----------consumer----------------  
            //-----------consumer----------------  
            var foodTypeOptions = "";
            var foodTypeSelected = "";
            var cus_name = cus_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-customer-name.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var consumer = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < consumer.length; i++) {
                        var optionValue = consumer[i].cus_email;
                        var optionText = consumer[i].cus_name;
                        if (optionText === cus_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelected = optionValue;
                        }
                        foodTypeOptions += '<option value="' + optionValue + '">' + optionText + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#cus_name').html(foodTypeOptions);
                    // set the selected option to the foodTypeSelected variable
                    $('#cus_name').val(foodTypeSelected);
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

            //-----------consumer----------------  
            //-----------consumer----------------  
            //-----------consumer----------------  

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

            //-----------payment----------------
            //-----------payment----------------
            //-----------payment----------------

            var foodTypeOptionsS = "";
            var foodTypeSelectedS = "";
            var payment_name = payment_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-payment.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var paymentS = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < paymentS.length; i++) {
                        var optionValueS = paymentS[i].payment_ID;
                        var optionTextS = paymentS[i].payment_name;
                        if (optionTextS === payment_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedS = optionValueS;
                        }
                        foodTypeOptionsS += '<option value="' + optionValueS + '">' + optionTextS + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#payment_name').html(foodTypeOptionsS);
                    // set the selected option to the foodTypeSelected variable
                    $('#payment_name').val(foodTypeSelectedS);
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

            //-----------payment----------------
            //-----------payment----------------
            //-----------payment----------------

            //-----------status----------------
            //-----------status----------------
            //-----------status----------------

            var foodTypeOptionsT = "";
            var foodTypeSelectedT = "";
            var status_name = status_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-status.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var statusT = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown

                    for (var i = 0; i < statusT.length; i++) {
                        var optionValueT = statusT[i].order_status_ID;
                        var optionTextT = statusT[i].status_name;
                        if (optionTextT === status_name) {

                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedT = optionValueT;
                        }
                        foodTypeOptionsT += '<option value="' + optionValueT + '">' + optionTextT + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#status_name').html(foodTypeOptionsT);
                    // set the selected option to the foodTypeSelected variable
                    $('#status_name').val(foodTypeSelectedT);

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

            //-----------status----------------
            //-----------status----------------
            //-----------status----------------
            Swal.fire({
                title: "Insert Data",
                html: '<div class="form-group">' +
                    '<label for="pro">Product</label>' +
                    '<input type="text" class="form-control" id="pro" >' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="price">Price</label>' +
                    '<input type="text" class="form-control" id="price">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="date">Date</label>' +
                    '<input type="date" class="form-control" id="date">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="cus_name">Customer</label>' +
                    '<select class="form-control" id="cus_name">' +
                    foodTypeOptions +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="res_name">Restaurant</label>' +
                    '<select class="form-control" id="res_name">' +
                    foodTypeOptionsR +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="payment_name">Payment</label>' +
                    '<select class="form-control" id="payment_name">' +
                    foodTypeOptionsS +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="status_name">Status</label>' +
                    '<select class="form-control" id="status_name">' +
                    foodTypeOptionsT +
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
                    // Show a success message
                    var formData = new FormData();
                    formData.append('pro', $('#pro').val());
                    formData.append('price', $('#price').val());
                    formData.append('date', $('#date').val());
                    formData.append('cus_name', $('#cus_name').val());
                    formData.append('res_name', $('#res_name').val());
                    formData.append('payment_name', $('#payment_name').val());
                    formData.append('status_name', $('#status_name').val());

                    // Show a success message
                    $.ajax({
                        type: "POST",
                        url: "insert-data-order.php",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            Swal.fire({
                                title: "Success!",
                                text: "Data has been saved successfully.",
                                icon: "success",
                                confirmButtonColor: "#10ae68",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        },
                    });
                }
            });
        }




        // ===================================================================== Update data =====================================================================
        function editData(order_ID, order_product, order_price, order_date, cus_name, res_name, payment_name, status_name) {
            console.log(order_ID, order_product, order_price, order_date, cus_name, res_name, payment_name);


            //-----------consumer----------------    
            //-----------consumer----------------  
            //-----------consumer----------------  
            var foodTypeOptions = "";
            var foodTypeSelected = "";
            var cus_name = cus_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-customer-name.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var consumer = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < consumer.length; i++) {
                        var optionValue = consumer[i].cus_email;
                        var optionText = consumer[i].cus_name;
                        if (optionText === cus_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelected = optionValue;
                        }
                        foodTypeOptions += '<option value="' + optionValue + '">' + optionText + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#cus_name').html(foodTypeOptions);
                    // set the selected option to the foodTypeSelected variable
                    $('#cus_name').val(foodTypeSelected);
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

            //-----------consumer----------------  
            //-----------consumer----------------  
            //-----------consumer----------------  

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

            //-----------payment----------------
            //-----------payment----------------
            //-----------payment----------------

            var foodTypeOptionsS = "";
            var foodTypeSelectedS = "";
            var payment_name = payment_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-payment.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var paymentS = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < paymentS.length; i++) {
                        var optionValueS = paymentS[i].payment_ID;
                        var optionTextS = paymentS[i].payment_name;
                        if (optionTextS === payment_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedS = optionValueS;
                        }
                        foodTypeOptionsS += '<option value="' + optionValueS + '">' + optionTextS + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#payment_name').html(foodTypeOptionsS);
                    // set the selected option to the foodTypeSelected variable
                    $('#payment_name').val(foodTypeSelectedS);
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

            //-----------payment----------------
            //-----------payment----------------
            //-----------payment----------------

            //-----------status----------------
            //-----------status----------------
            //-----------status----------------

            var foodTypeOptionsT = "";
            var foodTypeSelectedT = "";
            var status_name = status_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-status.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var statusT = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown

                    for (var i = 0; i < statusT.length; i++) {
                        var optionValueT = statusT[i].order_status_ID;
                        var optionTextT = statusT[i].status_name;
                        if (optionTextT === status_name) {

                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedT = optionValueT;
                        }
                        foodTypeOptionsT += '<option value="' + optionValueT + '">' + optionTextT + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#status_name').html(foodTypeOptionsT);
                    // set the selected option to the foodTypeSelected variable
                    $('#status_name').val(foodTypeSelectedT);

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

            //-----------status----------------
            //-----------status----------------
            //-----------status----------------


            Swal.fire({
                title: 'Edit Data',
                html: '<form id="edit-form" class="form">' +
                    '<div class="form-group">' +
                    '<label for="id" class="label font-weight-medium text-dark">ID :</label>' +
                    '<input type="text" id="id" name="id" value="' + order_ID +
                    '" class="form-control" disabled>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="rider" class="label font-weight-medium text-dark">Product :</label>' +
                    '<input type="email" id="pro" name="pro" value="' + order_product +
                    '" class="form-control" required>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="price" class="label font-weight-medium text-dark">Price :</label>' +
                    '<input type="number" id="price" name="price" value="' + order_price +
                    '" class="form-control" required>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="consumer" class="label font-weight-medium text-dark">Date :</label>' +
                    '<input type="date" id="date" name="date" value="' + order_date +
                    '" class="form-control" required>' +
                    '</div>' +
                    '</div>' +


                    '<div class="form-group">' +
                    '<label for="cus_name" class="label font-weight-medium text-dark">Consumer :</label>' +
                    '<select id="cus_name" name="cus_name" class="form-control">' +
                    foodTypeOptions +
                    '</select>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="res_name" class="label font-weight-medium text-dark">Restaurant :</label>' +
                    '<select id="res_name" name="res_name" class="form-control">' +
                    foodTypeOptionsR +
                    '</select>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="payment_name" class="label font-weight-medium text-dark">Payment :</label>' +
                    '<select id="payment_name" name="payment_name" class="form-control">' +
                    foodTypeOptionsS +
                    '</select>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="status_name" class="label font-weight-medium text-dark">Status :</label>' +
                    '<select id="status_name" name="status_name" class="form-control">' +
                    foodTypeOptionsT +
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
                    // Show a success message
                    var formData = new FormData();
                    formData.append('id', $('#id').val());
                    formData.append('pro', $('#pro').val());
                    formData.append('price', $('#price').val());
                    formData.append('date', $('#date').val());
                    formData.append('cus_name', $('#cus_name').val());
                    formData.append('res_name', $('#res_name').val());
                    formData.append('payment_name', $('#payment_name').val());
                    formData.append('status_name', $('#status_name').val());



                    $.ajax({
                        type: 'POST',
                        url: 'update-data-order.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Data edited successfully.',
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
        }

        // ===================================================================== delete data =====================================================================
        $(document).ready(function() {
            $('.delete-res').click(function() {
                var order_ID = $(this).data('order');
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: 'You want to delete ' + order_ID + ' record!',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',

                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'delete-data-order.php',
                            data: {
                                order_ID: order_ID
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