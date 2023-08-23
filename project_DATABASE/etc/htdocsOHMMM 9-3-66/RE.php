<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="RE_style.css">
    <link rel="icon" type="image/png" sizes="50x50" href="Grabfood.png">

    <title>Register</title>
</head>

<body>
    <section>



        <div class="container">
            <div class="forms">
                <div class="form-register">
                    <span class="title">Register</span>

                    <form action="RE.php" method="POST">



                        <div class="input-field">
                            <select name="dropdown" id="dropdown" placeholder="Role" required onchange="hideAddress()">
                                <option value="Consumer" selected>Consumer</option>
                                <option value="Driver">Driver</option>
                                <option value="Restaurant">Restaurant</option>
                            </select>
                        </div>


                        <div class="input-field">
                            <input type="email" name="email" placeholder="Enter your Email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field " id="name-field">
                            <input type="text" name="name" placeholder="Enter your Name" required>
                            <i class="uil uil-user icon"></i>
                        </div>
                        <div class="input-field" id="surname-field">
                            <input type="text" name="surname" placeholder="Enter your Surname" >
                            <i class="uil uil-user icon"></i>
                        </div>
                        <div class="input-field" id="birthday-field">
                            <input type="date" name="Birthday" placeholder="Enter your Birthday" >
                            <i class="uil uil-calendar-alt"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" name="telphone" placeholder="Enter your Telphone" required>
                            <i class="uil uil-phone icon"></i>
                        </div>
                        <div class="input-field" id="address-field">
                            <input type="text" name="address" placeholder="Enter your Address" >
                            <i class="uil uil-home icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" placeholder="Enter your Password" required>
                            <i class="uil uil-lock icon"></i>
                            <!-- <i class="uil uil-eye-slash showHidePw"></i> -->
                        </div>
                        <div class="input-field button">
                            <button type="submit" value="Sing Up">Sign Up</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

    <script>
        function hideAddress() {
            var dropdown = document.getElementById("dropdown");

            var addressField = document.getElementById("address-field");
            var birthdayField = document.getElementById("birthday-field");
            var surnameField = document.getElementById("surname-field");
            var nameField = document.getElementById("name-field");

            if (dropdown.value == "Driver") {


                addressField.style.display = "none";



                birthdayField.style.display = "block";
                surnameField.style.display = "block";

            } else if (dropdown.value == "Restaurant") {
                addressField.style.display = "none";

                birthdayField.style.display = "none";

                surnameField.style.display = "none";


            }
            else {
                addressField.style.display = "block";

                birthdayField.style.display = "block";

                surnameField.style.display = "block";



            }
        }
    </script>
    <?php
    if (isset($_POST['dropdown'])) {
        $value = $_POST['dropdown'];

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'grab'; ///////////////////////////////////////////
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        mysqli_set_charset($conn, "utf8");

        if ($value == "Consumer") {

            $email = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $Birthday = $_POST['Birthday'];
            $telphone = $_POST['telphone'];
            $address = $_POST['address'];
            $password = $_POST['password'];

            $sql = "INSERT INTO cus (cus_email, cus_name, cus_surname, cus_birthdate, cus_tel, cus_address, cus_password) 
                VALUES ('$email', '$name', '$surname', '$Birthday', '$telphone', '$address', '$password')";

            $result = mysqli_query($conn, $sql);
        } else if ($value == "Driver") {

            if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['Birthday']) && isset($_POST['telphone']) && isset($_POST['address']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $Birthday = $_POST['Birthday'];
                $telphone = $_POST['telphone'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $salary = NULL;

                $sql = "INSERT INTO rider (rider_email, rider_name, rider_surname, rider_birthdate, rider_tel, rider_password,rider_salary) 
                VALUES ('$email', '$name', '$surname', '$Birthday', '$telphone', '$password' , '$salary')";

                $result = mysqli_query($conn, $sql);

            }
        } else if ($value == "Restaurant") {

            if (isset($_POST['email']) && isset($_POST['name'])  && isset($_POST['telphone']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $telphone = $_POST['telphone'];
                $password = $_POST['password'];
                $salary = NULL;
                $address = NULL;
                $d = NULL;
                $status = NULL;
                $picture = NULL;


                $sql = "INSERT INTO restaurant (res_picture, res_name, res_email, res_password, res_open_status, res_tel, res_detail, res_address) 
                VALUES ('$picture','$name', '$email', '$password', '$status', '$telphone', '$d' , '$address')";

                $result = mysqli_query($conn, $sql);

            }
        }




        mysqli_close($conn);
    }




    ?>

</body>

</html>