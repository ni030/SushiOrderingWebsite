<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
}

require_once("../backend/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login</title>
    <style>
        .notification {
            display: none;
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f4e7d4;
            color: #ab4247;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="notification" id="loginNotification">
        Please login to continue !
    </div>
    <div class="content">
        <div class="login-section">
            <div class="form-container">
                <form id="login-form" class="row g-3" method="POST" action="../backend/loginUser.php">
                    <div class="col-12">
                        <h2>Log in</h2>
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email"
                            placeholder="abc@gmail.com" required>
                        <p class="error" id="email_error">* Email is not existed!</p>
                    </div>

                    <div class="col-md-12 password-section">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" required>
                        <span class="fa fa-eye " id="togglePassword1"></span>
                    </div>
                    <p style="margin-top:0px;" class="error" id="pass_error">* Invalid password!</p>

                    <div class="col-12">
                        <input type="submit" name="MM_select" value="Login">
                    </div>
                </form>
                <p class="signup-link">Don't have an account? <a href="register.php">Sign up now!</a></p>
            </div>
        </div>
    </div>
    <script>
        // Check if the URL contains the showNotification query parameter
        const urlParams = new URLSearchParams(window.location.search);
        const showNotification = urlParams.get('showNotification');

        if (showNotification === 'true') {
            const notification = document.getElementById('loginNotification');
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000); // Hide the notification after 3 seconds
        }
    </script>
    <script src="JS/nav.js"></script>
    <script src="JS/login.js"></script>
    <?php
    include("footer.html");
    ?>
</body>

</html>
