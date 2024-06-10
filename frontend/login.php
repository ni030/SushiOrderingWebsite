<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../frontend/index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <title>Login</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="navbar-brand">
                <a href="#" class="navbar-logo">
                    <img src="../img/logo.PNG" alt="Logo">
                </a>
                <span class="shop-name">Sushi Bliss</span>
            </div>
            <ul class="navbar-menu">
                <li><a href="index.php" id="home-link">Home</a></li>
                <li><a href="menu.html" id="menu-link">Menu</a></li>
                <li><a href="promotion.html" id="promotion-link">Promotion</a></li>
            </ul>
        </div>
        <div class="navbar-profile">
            <a href="login.php" id="login-link">Login</a>
            <span id="profile-name" style="display: none;"></span>
        </div>
    </nav>
    <div class="content">
        <h2 style="color: white;">Log in now to enjoy exclusive deals and discounts!</h2>
        <div class="form-container">
            <form id="login-form" method="POST" action="../backend/loginUser.php">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                        placeholder="name@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="inputPassword5" class="form-control" name="password" required>
                </div>
                <div class="col-12">
                    <input type="submit" name="MM_select" value="Login">
                </div>
                <div class="col-12">
                    <p id="error-message" style="color: red; display: none;"></p>
                </div>
            </form>
            <p class="signup-link">Don't have an account? <a href="register.html">Sign up now!</a></p>
        </div>
    </div>
    <script src="nav.js"></script>
    <!-- <script src="login.js"></script> -->
</body>

</html>