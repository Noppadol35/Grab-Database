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
</head>

<body>
    <section>
        <div class="form-box">
            

            <div class="form-value">
                <form action="login-data.php" method = "post">
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
                    <div class="create">
                        <input type="checkbox" id="rememberMeCheckbox">
                        <label for="rememberMeCheckbox" id="checkboxLabel">Remember me</label>
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




</body>

</html>