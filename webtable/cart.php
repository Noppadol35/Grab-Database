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
$totalRecords = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM cart"))[0];

// Create the pagination object
$paginator = new Paginator($totalRecords, $recordsPerPage, $page, 'page=');

// Construct the SQL query
$sql = "SELECT * FROM cart LIMIT $offset, $recordsPerPage";

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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning <?php echo $row['cus_name']; ?></h3>
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
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">cart_ID

                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">consumer

                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Food
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Quantity
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                                    Total Price
                                                </th>

                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Status
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">order
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
                                            ?>

                                                <tr>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <div align="center">
                                                            <?php echo $i; ?>
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["cart_ID"]; ?>
                                                    </td>

                                                    <?php
                                                    $cus_email = $objResult['cus_email'];
                                                    $sqlcus = "SELECT * FROM cus WHERE cus_email = '$cus_email'";
                                                    $rescus = mysqli_query($conn, $sqlcus);
                                                    $rowcus = mysqli_fetch_array($rescus);

                                                    $cus_name = $rowcus['cus_name'];

                                                    ?>

                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $cus_name ?>
                                                    </td>

                                                    <?php
                                                    $food_ID = $objResult['food_ID'];
                                                    $sqlfood = "SELECT * FROM food WHERE food_ID = '$food_ID'";
                                                    $resfood = mysqli_query($conn, $sqlfood);
                                                    $rowfood = mysqli_fetch_array($resfood);

                                                    $food_name = $rowfood['food_name'];
                                                    $food_price = $rowfood['food_price'];
                                                    $total_text = "Amount * $food_price";

                                                    ?>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $food_name ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_amount"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo number_format($objResult["food_total"], 2, ".", ","); ?>
                                                    </td>
                                                    <?php
                                                    $res_email = $objResult['res_email'];
                                                    $sqlres = "SELECT * FROM restaurant WHERE res_email = '$res_email'";
                                                    $resres = mysqli_query($conn, $sqlres);
                                                    $rowres = mysqli_fetch_array($resres);
                                                    $res_name = $rowres['res_name'];
                                                    ?>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $res_name ?>
                                                    </td>
                                                    <?php
                                                    $status_ID = $objResult['status'];
                                                    $sqlstatus = "SELECT * FROM cart_status WHERE cart_status = '$status_ID'";
                                                    $resstatus = mysqli_query($conn, $sqlstatus);
                                                    $rowstatus = mysqli_fetch_array($resstatus);
                                                    $status_name = $rowstatus['status_name'];
                                                    ?>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $status_name ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["order_ID"]; ?>
                                                    </td>




                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="updataedata.php" method="post">

                                                                <a href="#" class="btn btn-warning btn-rounded" onclick="editData('<?php echo $objResult['cart_ID']; ?>','<?php echo $cus_name ?>','<?php echo $food_name ?>','<?php echo $objResult['food_amount']; ?>','<?php echo $total_text ?>','<?php echo $res_name ?>','<?php echo $status_name ?>','<?php echo $objResult['order_ID'] ?>','<?php echo $food_price ?>')">Edit</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-medium text-dark px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="deletedata.php" method="post">
                                                                <a href="#" class="btn waves-effect waves-light btn-rounded btn-danger delete-food" data-food="<?php echo $objResult["cart_ID"]; ?>">Remove</a>
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

            //-----------food----------------

            var foodTypeOptionsF = "";
            var foodTypeSelectedF = "";
            var food_name = food_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-food-name.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var food = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < food.length; i++) {
                        var optionValueF = food[i].food_ID;
                        var optionTextF = food[i].food_name;
                        if (optionTextF === food_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedF = optionValueF;
                        }
                        foodTypeOptionsF += '<option value="' + optionValueF + '">' + optionTextF + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#food_name').html(foodTypeOptionsF);
                    // set the selected option to the foodTypeSelected variable
                    $('#food_name').val(foodTypeSelectedF);
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

            //-----------food----------------
            //-----------food----------------
            //-----------food----------------

            //-----------------status----------------
            var foodTypeOptionsS = "";
            var foodTypeSelectedS = "";
            var status_name = status_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-cart-status.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var cart_S = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < cart_S.length; i++) {
                        var optionValueS = cart_S[i].cart_status;
                        var optionTextS = cart_S[i].status_name;
                        if (optionTextS === status_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedS = optionValueS;
                        }
                        foodTypeOptionsS += '<option value="' + optionValueS + '">' + optionTextS + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#status_name').html(foodTypeOptionsS);
                    // set the selected option to the foodTypeSelected variable
                    $('#status_name').val(foodTypeSelectedS);
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

            //-----------------status----------------
            //-----------------status----------------
            //-----------------status----------------

            //-----------order_ID----------------
            var foodTypeOptionsO = "";
            var foodTypeSelectedO = "";
            var order_ID = order_ID;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-order.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var order = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < order.length; i++) {
                        var optionValueO = order[i].order_ID;
                        var optionTextO = order[i].order_ID;
                        if (optionTextO === order_ID) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedO = optionValueO;
                        }
                        foodTypeOptionsO += '<option value="' + optionValueO + '">' + optionTextO + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#order_ID').html(foodTypeOptionsO);
                    // set the selected option to the foodTypeSelected variable
                    $('#order_ID').val(foodTypeSelectedO);
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
                    '<label for="cus_name" class="label font-weight-medium text-dark">Consumer :</label>' +
                    '<select id="cus_name" name="cus_name" class="form-control">' +
                    foodTypeOptions +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_name" class="label font-weight-medium text-dark">Food :</label>' +
                    '<select id="food_name" name="food_name" class="form-control">' +
                    foodTypeOptionsF +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_amount" class="label font-weight-medium text-dark">Amount :</label>' +
                    '<input type="number" class="form-control" id="food_amount" name="food_amount" >' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="status_name" class="label font-weight-medium text-dark">Status :</label>' +
                    '<select id="status_name" name="status_name" class="form-control">' +
                    foodTypeOptionsS +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="order_ID" class="label font-weight-medium text-dark">Order ID :</label>' +
                    '<select id="order_ID" name="order_ID" class="form-control">' +
                    foodTypeOptionsO +
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

                    formData.append('cus_name', $('#cus_name').val());
                    formData.append('food_name', $('#food_name').val());
                    formData.append('food_amount', $('#food_amount').val());

                    formData.append('res_name', $('#res_name').val());
                    formData.append('status_name', $('#status_name').val());
                    formData.append('order_ID', $('#order_ID').val());



                    $.ajax({
                        type: 'POST',
                        url: 'insert-data-cart.php',
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
            document.getElementById("food_amount").addEventListener("input", function() {
                // Get the input value
                var value = this.value;
                // Check if the input value is a valid integer
                if (isNaN(value) || !Number.isInteger(Number(value))) {
                    // If not, disable the "Save" button
                    document.querySelector(".swal2-confirm").disabled = true;
                } else {
                    // If yes, enable the "Save" button
                    document.querySelector(".swal2-confirm").disabled = false;
                }
            });
        }

        // ===================================================================== Update data =====================================================================

        function editData(cart_ID, cus_name, food_name, food_amount, food_total, res_name, status_name, order_ID, food_price) {

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

            //-----------food----------------

            var foodTypeOptionsF = "";
            var foodTypeSelectedF = "";
            var food_name = food_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-food-name.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var food = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < food.length; i++) {
                        var optionValueF = food[i].food_ID;
                        var optionTextF = food[i].food_name;
                        if (optionTextF === food_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedF = optionValueF;
                        }
                        foodTypeOptionsF += '<option value="' + optionValueF + '">' + optionTextF + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#food_name').html(foodTypeOptionsF);
                    // set the selected option to the foodTypeSelected variable
                    $('#food_name').val(foodTypeSelectedF);
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

            //-----------food----------------
            //-----------food----------------
            //-----------food----------------

            //-----------------status----------------
            var foodTypeOptionsS = "";
            var foodTypeSelectedS = "";
            var status_name = status_name;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-cart-status.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var cart_S = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < cart_S.length; i++) {
                        var optionValueS = cart_S[i].cart_status;
                        var optionTextS = cart_S[i].status_name;
                        if (optionTextS === status_name) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedS = optionValueS;
                        }
                        foodTypeOptionsS += '<option value="' + optionValueS + '">' + optionTextS + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#status_name').html(foodTypeOptionsS);
                    // set the selected option to the foodTypeSelected variable
                    $('#status_name').val(foodTypeSelectedS);
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

            //-----------------status----------------
            //-----------------status----------------
            //-----------------status----------------

            //-----------order_ID----------------
            var foodTypeOptionsO = "";
            var foodTypeSelectedO = "";
            var order_ID = order_ID;

            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
                type: 'POST',
                url: '/get-order.php',
                success: function(data) {
                    // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
                    var order = JSON.parse(data);
                    // วนลูปเพื่อสร้าง options ของ dropdown
                    for (var i = 0; i < order.length; i++) {
                        var optionValueO = order[i].order_ID;
                        var optionTextO = order[i].order_ID;
                        if (optionTextO === order_ID) {
                            // if the current optionText matches the type_name variable,
                            // set the foodTypeSelected variable to the current optionValue
                            foodTypeSelectedO = optionValueO;
                        }
                        foodTypeOptionsO += '<option value="' + optionValueO + '">' + optionTextO + '</option>';
                    }
                    // แทรก options ใน dropdown
                    $('#order_ID').html(foodTypeOptionsO);
                    // set the selected option to the foodTypeSelected variable
                    $('#order_ID').val(foodTypeSelectedO);
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
                    '<label for="cus_name">Cart ID :</label>' +
                    '<input type="text" class="form-control" id="id" name="id" value="' + cart_ID + '" readonly>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<div class="form-group">' +
                    '<label for="cus_name" class="label font-weight-medium text-dark">Consumer :</label>' +
                    '<select id="cus_name" name="cus_name" class="form-control">' +
                    foodTypeOptions +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_name" class="label font-weight-medium text-dark">Food :</label>' +
                    '<select id="food_name" name="food_name" class="form-control">' +
                    foodTypeOptionsF +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_amount" class="label font-weight-medium text-dark">Amount :</label>' +
                    '<input type="number" class="form-control" id="food_amount" name="food_amount" value="' + food_amount + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="res_name" class="label font-weight-medium text-dark">Restaurant :</label>' +
                    '<input type="text" class="form-control" id="res_name" name="res_name" value="' + res_name + '" readonly>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="status_name" class="label font-weight-medium text-dark">Status :</label>' +
                    '<select id="status_name" name="status_name" class="form-control">' +
                    foodTypeOptionsS +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="order_ID" class="label font-weight-medium text-dark">Order ID :</label>' +
                    '<select id="order_ID" name="order_ID" class="form-control">' +
                    foodTypeOptionsO +
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
                    formData.append('id', $('#id').val());
                    formData.append('cus_name', $('#cus_name').val());
                    formData.append('food_name', $('#food_name').val());
                    formData.append('food_amount', $('#food_amount').val());

                    formData.append('res_name', $('#res_name').val());
                    formData.append('status_name', $('#status_name').val());
                    formData.append('order_ID', $('#order_ID').val());


                    $.ajax({
                        type: 'POST',
                        url: 'update-data-cart.php',
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
            document.getElementById("food_amount").addEventListener("input", function() {
                // Get the input value
                var value = this.value;
                // Check if the input value is a valid integer
                if (isNaN(value) || !Number.isInteger(Number(value))) {
                    // If not, disable the "Save" button
                    document.querySelector(".swal2-confirm").disabled = true;
                } else {
                    // If yes, enable the "Save" button
                    document.querySelector(".swal2-confirm").disabled = false;
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
                            url: 'delete-data-cart.php',
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