<!DOCTYPE html>
<html lang="en">
<style>
body {
    font-family: 'Prompt', sans-serif !important;
}
</style>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/test.css?v=59" rel="stylesheet">


    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css?v=67">

    <!-- Default Theme -->
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css?v=77">

</head>
<nav class="navbar navbar-expand d-sm-block navbar-light bg-white jobbar fixed-top static-top shadow" id="HeaderZ">

    <!-- Sidebar Toggle (Topbar) -->
    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button> -->




    <!-- Topbar Navbar -->

    <div class="collapse navbar-collapse topbar" id="navbarNavDropdown">
        <div class="logo1">
            <!-- <img src="/hotel/images/logo.jpg" class="imagelogo1" id="Headerlogo">
 -->

        </div>


        <ul class="navbar-nav sm-auto" style="margin-inline: auto !important">

            <!-- Nav Item - User Information -->

            <!-- <li class="nav-item ">
            <a href="javascript:void(0)">Gallery</a>
            <a href="javascript:void(0)">Attraction</a>
            <a href="javascript:void(0)">Facilities</a>
            <a href="accom.php">Accommodacations</a>
            <a class="active" href="save_register">Home</a>
        </li> -->

            <!-- close -->
            <!-- <?php 
                $strSQL = "SELECT * FROM type_room WHERE type_room.status = 'on'";
                $objQuery = mysqli_query($conn, $strSQL);
                $tbl = array();
                while($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)){
                    array_push($tbl,$objResult['name']);
                };
            ?> -->

            <ul class="nav">
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="index">Home</a>
                </li> -->
                <li class="nav-item dropdown" style="margin-top: 20px;">
                    <a class="nav-link dropbtn newcolor underline-animation" href="index">personal information</a>
                </li>
                <li class="nav-item" style="margin-top: 20px;">
                    <a class="nav-link newcolor2  underline-animation" href="facilities">acticle</a>
                </li>
                <style>
                .dropdown-toggle::after {
                    display: none !important;
                }
                </style>
                <li class="nav-item dropdown " style="margin-top: 20px;">
                    <a class="nav-link dropbtn newcolor3 " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Presentation video
                    </a>
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item undermeet" style="margin-top: 8px; font-size:1.016rem;"
                            href="Meeting">Meeting</a>
                        <a class="dropdown-item underwed" style="margin-top: 3px; font-size:1.016rem;"
                            href="Wedding">Wedding</a>
                    </div> -->
                </li>

                </li>
                <!-- <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                <li class="nav-item dropdown  show" style="margin-top: 20px;">
                    <a class="nav-link dropdown-toggle newcolor" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage <i class="fa fa-angle-down p-1" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="manage?type=type">ประเภทของห้อง</a>
                        <a class="dropdown-item" href="manage?type=room">ห้อง</a>
                        <a class="dropdown-item" href="manage?type=order">การจองห้อง</a>
                    </div>
                </li>
                <?php } ?>
                <div class="topbar-divider d-none d-sm-block"></div> -->


                <!-- <li class="nav-item no-arrow login">
                <a class="nav-link  login"  id="exampleModal" role="button" data-toggle="modal" data-target="#exampleModal" >
                    <span class="mr-2 d-none d-lg-inline login p-2 rounded-sm ">Log in</span>

                </a> -->
                <!-- Button trigger modal -->




</nav>

<script src="vendor/jquery/jquery.min.js"></script>
<script>
function resizeHeader() {
    let header = document.getElementById("HeaderZ")
    if (window.scrollY > 0) {
        header.classList.add('schooooo')
    } else {
        header.classList.remove('schooooo')
    }
}
window.addEventListener("scroll", resizeHeader)
</script>
<!-- <script>
function resizeHeader() {
    let header = document.getElementById("Headerlogo")
    if (window.scrollY > 0) {
        header.classList.add('logo')
    } else {
        header.classList.remove('logo')
    }
}
window.addEventListener("scroll", resizeHeader)
</script> -->
<!-- <script>
function resizeHeader() {
    let header = document.getElementById("Headertextlogo")
    if (window.scrollY > 0) {
        header.classList.add('texthead')
    } else {
        header.classList.remove('texthead')
    }
}
window.addEventListener("scroll", resizeHeader)
</script>
<script>
function resizeHeader() {
    let header = document.getElementById("Headertextresort")
    if (window.scrollY > 0) {
        header.classList.add('textre')
    } else {
        header.classList.remove('textre')
    }
}
window.addEventListener("scroll", resizeHeader)
</script> -->

<style>
.jobbar {
    height: 7.565rem !important;
    width: 1275px !important;
    background-color: red;
    transition: height 0.25s cubic-bezier(0, 0, 0.47, -0.09);
}

.schooooo {
    height: 5.575rem !important;

}

.navbar {
    padding: 0 !important;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown:hover .dropdown-menu2 {
    display: block;
}


.imagelogo1 {
    width: 175px;
    padding: 1px;
    margin-left: 136px;
    border-radius: 0;
    /* margin-left: 54px; */
    /* margin-block-start: 61px; */
    /* margin-inline-start: 20px; */
    margin-top: -39px;
    height: 84px;
    transition: height 0.25s cubic-bezier(0, 0, 0.47, -0.09);
}

.logo {
    width: 144px;
    height: 67px;
    margin-top: -29px;
    margin-left: 130px !important;
}

.resort1 {
    margin-left: 206px;
    margin-top: -26px;
    font-family: system-ui;
    letter-spacing: 1px;
    font-size: 0.857rem;
}

.hdt {
    letter-spacing: 3px;
    margin-left: 161px;
    margin-top: -8px;
    font-family: math;
    font-size: 0.999rem;
}

.texthead {
    margin-left: 148px !important;
    font-size: 14px !important;
    margin-top: -5px;
}

.textre {
    margin-top: -26px;
    font-size: 11px;
    margin-left: 190px;
}
</style>