<!DOCTYPE html>
<html dir="ltr" lang="en">

<!--- js ---->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<!-- databoot -->
<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab'; ///////////////////////////////

$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn, "utf8");
// SQL query to retrieve data from a table
$sql = "SELECT * FROM food"; /////////////////////////////

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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="assets/images/Grab_logo/Grab_logo_resize.png" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="assets/images/Grab_logo/Grab_logo_resize.png" alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="assets/images/Grab_logo/Grab_logo_name_resize.png" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="assets/images/Grab_logo/Grab_logo_name_resize.png" class="light-logo"
                                    alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
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
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/Grab_logo/Grab_logo_resize.png" alt="user"
                                    class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">Grab food</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div>
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
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><span class="hide-menu">Consumer</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="consumer.php"
                                aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">Consumer
                                    profile</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Rider</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="rider.php"
                                aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">Rider
                                    profile</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Merchant</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="restaurant.php"
                                aria-expanded="false"><i class="icon-basket"></i><span
                                    class="hide-menu">Restaurant</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="food_order.php"
                                aria-expanded="false"><i class=" icon-basket"></i><span class="hide-menu">Food order
                                </span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class=" icon-basket"></i><span class="hide-menu">Food
                                </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="food_type.php" class="sidebar-link"><span
                                            class="hide-menu"> Food category
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="food.php" class="sidebar-link"><span
                                            class="hide-menu"> Food
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Grab</h3>
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
                                        <a href="#" class="btn waves-effect waves-light btn-rounded btn btn-success"
                                                style="float:right;" onclick="insertData()">Add</a>
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
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Amount
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Type
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Restaurant
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


                                                    <td class="font-weight-medium text-dark border-top-0 px-2 py-4">
                                                        <img alt="" style="width: 10rem; background-color: #8f5c63;
                                                         display: inline-flex;
    align-items: center; border-radius: 10% !important" src="<?php echo 'uploads/' . $objResult["food_picture"]; ?>"
                                                            class="rounded-circle">
                                                    </td>

                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_ID"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_name"]; ?>
                                                    </td>

                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_detail"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_price"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["food_amount"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["type_ID"]; ?>
                                                    </td>
                                                    <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                                                        <?php echo $objResult["res_email"]; ?>
                                                    </td>


                                                    <td
                                                        class="font-weight-medium text-dark border-top-2 px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="updataedata.php" method="post">

                                                                <a href="#" class="btn btn-warning btn-rounded"
                                                                    onclick="editData('<?php echo $objResult['food_picture'] ?>','<?php echo $objResult['food_ID'] ?>', '<?php echo $objResult['food_name'] ?>', '<?php echo $objResult['food_detail'] ?>','<?php echo $objResult['food_price'] ?>' ,'<?php echo $objResult['food_amount'] ?>','<?php echo $objResult['type_ID'] ?>','<?php echo $objResult['res_email'] ?>')">Edit</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-medium text-dark px-2 py-4 text-center">
                                                        <div class="d-flex align-items-center">
                                                            <form action="deletedata.php" method="post">
                                                                <a href="#"
                                                                    class="btn waves-effect waves-light btn-rounded btn-danger delete-food"
                                                                    data-food="<?php echo $objResult["food_ID"]; ?>">Remove</a>
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
                                </div>
                                <div style="float:right;">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" style="color: #2dce89;" href="javascript:void(0)"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-dark"
                                                    href="javascript:void(0)">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-dark"
                                                    href="javascript:void(0)">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-dark"
                                                    href="javascript:void(0)">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" style="color: #2dce89;" href="javascript:void(0)"
                                                    aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
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
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            };
        }


        // ===================================================================== Insert data =====================================================================
        function insertData() {
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
                    '<label for="food_ID" class="label font-weight-medium text-dark">Food ID :</label>' +
                    '<input type="text" id="food_ID" name="food_ID" class="form-control">' +
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
                    '<label for="food_amount" class="label font-weight-medium text-dark">Food Amount :</label>' +
                    '<input type="number" id="food_amount" name="food_amount" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="type_ID" class="label font-weight-medium text-dark">Type ID :</label>' +
                    '<input type="text" id="type_ID" name="type_ID" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="res_email" class="label font-weight-medium text-dark">Email :</label>' +
                    '<input type="email" id="res_email" name="res_email" class="form-control">' +
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
                    formData.append('food_ID', $('#food_ID').val());
                    formData.append('food_name', $('#food_name').val());
                    formData.append('food_detail', $('#food_detail').val());
                    formData.append('food_price', $('#food_price').val());
                    formData.append('food_amount', $('#food_amount').val());
                    formData.append('type_ID', $('#type_ID').val());
                    formData.append('res_email', $('#res_email').val());


                    $.ajax({
                        type: 'POST',
                        url: 'insert-data-food.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
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
                        error: function () {
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

        // ===================================================================== Update data =====================================================================


        function editData(food_picture, food_ID, food_name, food_detail, food_price, food_amount, type_ID, res_email) {

        console.log(food_picture, food_ID, food_name, food_detail, food_price, food_amount, type_ID, res_email);
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
                    '<label for="food_ID" class="label font-weight-medium text-dark">Name :</label>' +
                    '<input type="text" id="food_ID" name="food_ID" value="' + food_ID + '" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_name" class="label font-weight-medium text-dark">Name :</label>' +
                    '<input type="text" id="food_name" name="food_name" value="' + food_name + '" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_detail" class="label font-weight-medium text-dark">Detail :</label>' +
                    '<textarea id="food_detail" name="food_detail" class="form-control">' + food_detail + '</textarea>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_price" class="label font-weight-medium text-dark">Price :</label>' +
                    '<input type="number" id="food_price" name="food_price" value="' + food_price + '" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="food_amount" class="label font-weight-medium text-dark">Amount :</label>' +
                    '<input type="number" id="food_amount" name="food_amount" value="' + food_amount + '" class="form-control">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="type_ID" class="label font-weight-medium text-dark">Type ID :</label>' +

                    '<input type="text" id="type_ID" name="type_ID" value="' + type_ID + '" class="form-control">' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label for="res_email" class="label font-weight-medium text-dark">Email :</label>' +
                    '<input type="email" id="res_email" name="res_email" value="' + res_email + '" class="form-control">' +
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
                            formData.append('food_amount', $('#food_amount').val());
                            formData.append('type_ID', $('#type_ID').val());
                            formData.append('res_email', $('#res_email').val());


                            $.ajax({
                                type: 'POST',
                                url: 'update-data-food.php',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (data) {
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
                                error: function () {
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
        $(document).ready(function () {
            $('.delete-food').click(function () {
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
                            success: function (data) {
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
                            error: function () {
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