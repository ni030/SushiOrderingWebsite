<?php
session_start();

require_once("../backend/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="content">
        <div class="form-container">
            <form id="login-form" method="POST" action="../backend/loginUser.php">
                <div class="col-12">
                    <h2>Log in</h2>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" required>
                    <p id="email_error" style="color: red; display: none;">Email is not existed!</p>
                </div>

                <div class="mb-3">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="inputPassword5" class="form-control" name="password" required>
                    <p id="pass_error" style="color: red; display: none;">Invalid password!</p>
                </div>
                <div class="col-12">
                    <input type="submit" name="MM_select" value="Login">
                </div>
            </form>
            <p class="signup-link">Don't have an account? <a href="register.php">Sign up now!</a></p>
        </div>
    </div>
    <script src="JS/nav.js"></script>
    <script src="JS/login.js"></script>
    <?php
    include("footer.html");
    ?>
</body>

</html>