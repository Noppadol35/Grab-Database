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
$sql = "SELECT * FROM cus"; /////////////////////////////
// Execute the query and get the result set
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

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
    <!-- ridertom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- ridertom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="table-responsive">
        <table class="table no-wrap v-middle mb-0">
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
                            <?php echo $objResult["cus_email"]; ?>
                        </td>

                        <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                            <?php echo $objResult["cus_name"]; ?>
                        </td>
                        <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                            <?php echo $objResult["cus_surname"]; ?>
                        </td>
                        <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                            <?php echo $objResult["cus_birthdate"]; ?>
                        </td>
                        <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                            <?php echo $objResult["cus_tel"]; ?>
                        </td>
                        <td class="font-weight-medium text-dark border-top-2 px-2 py-4">
                            <?php echo $objResult["cus_address"]; ?>
                        </td>
                        <td class="font-weight-medium text-dark border-top-2 px-2 py-4 text-center">
                            <div class="d-flex align-items-center"> 
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
    <!--ridertom JavaScript -->
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


</body>

</html>