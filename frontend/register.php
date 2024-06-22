<?php
session_start();

require_once("../backend/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--footer-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../frontend/CSS/footer.css">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/nav.css">
    <link rel="stylesheet" href="CSS/register.css">
    <title>Register</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container content">
        <div class="form-container">
            <form id="register-form" class="row g-3" method="POST" action="../backend/registerUser.php">
                <div class="col-md-12">
                    <h2 style="text-align: center;">Register</h2>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control" id="validationDefault01" name="firstName" required>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="validationDefault02" name="lastName" required>
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="abc@gmail.com" required>
                    <p style=" color: red; display: none;" id="email_error">Email Exist!</p>
                </div>

                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="validationDefault02" name="mobileNum" placeholder="012-3456789" required>
                    <p style=" color: red; display: none;" id="phone_error">Mobile Number Exist!</p>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                    <p id="password_error" style=" color: red; display: none;">Your password length needs to be at least
                        8 & contains at least 1 uppercase character & number!</p>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="confirmedPassword" required>
                    <p id="matched_error" style=" color: red; display: none;">Your password does not match!</p>
                </div>

                <!-- Need 1 input for birthday -->
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="inputPassword4" name="birthday" required>
                </div>
                <!-- End -->
                <div class="col-12 col-12 d-flex justify-content-end">
                    <input type="submit" name="MM_insert" value="Register Now">
                </div>
            </form>

        </div>
    </div>
    <!--footer-->
    <?php
    include("footer.html");
    ?>
    <script src="JS/nav.js"></script>
    <script src="JS/register.js"></script>
</body>

</html>