<!--- js ---->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="50x50" href="Grablogo">
    <link rel="stylesheet" href="login_style.css">
    <title>Grab</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function Wrong() {
            Swal.fire({
                title: 'Error!',
                text: "Wrong Username or Password",
                icon: 'error',
                showCancelButton: false,
              
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'Grab_login.php';
                }
            }
                    )
                }
       
    </script>

</head>

<body>
    <section>
        <div class="form-box">


            <div class="form-value">
                <form action="login-data.php" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label class="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label class="password">Password</label>
                    </div>
                
                    <button type="submit" name="signin">Log in</button>
                    <div class="register">
                        <p>New to Grabfood? <a href="RE.php">Create User</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



    <?php
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'grab';

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $errors = array();

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Check if the user exists
    
        if (count($errors) == 0) {
            $query = "SELECT * FROM cus WHERE cus_email='$email' AND cus_password='$password'";
            $results = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($results) == 1) {

                if($email === "admin@gmail.com") {
                    header('location: /webtable/index.php');
                }else{

                
                $_SESSION['cus_email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: /Grab-P/index.html');
                
                }
                exit();
            } else {
                $query = "SELECT * FROM rider WHERE rider_email='$email' AND rider_password='$password'";
                $results = mysqli_query($conn, $query);

                if (mysqli_num_rows($results) == 1) {
                    $_SESSION['rider_email'] = $email;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: /webtable/test.html');
                    exit();
                } else {
                    array_push($errors, "Wrong username/password combination");
                    echo "<script>Wrong();</script>";

                }
            }
        }
    }
    ?>


</body>

</html>