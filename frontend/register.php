<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="stylesheet" href="CSS/nav.css">
    <title>Register</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-left">
            <div class="navbar-brand">
                <a href="index.php" class="navbar-logo">
                    <img src="img/logo.PNG" alt="Logo">
                </a>
                <span class="shop-name">Sushi Bliss</span>
            </div>
            <ul class="navbar-menu">
                <li><a href="index.php" id="home-link">Home</a></li>
                <li><a href="menuPage.php" id="menu-link">Menu</a></li>
                <li><a href="promotion.php" id="promo-link">Promotion</a></li>
            </ul>
        </div>
        <div class="navbar-profile">
            <a href="login.php" id="login-link">Login</a>
            <span id="profile-name" style="display: none;"></span>
        </div>
    </nav>
    <div class="content">
        <h1>Let's Get Started!</h1>
        <h2>Sign up now to enjoy finger lickin' good deals</h2>
        <div class="form-container">
            <form id="register-form" class="row g-3" method="POST" action="../backend/registerUser.php">
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
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="abc@gmail.com"
                        required>
                </div>

                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="validationDefault02" name="mobileNum"
                        placeholder="012-3456789" required>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="confirmedPassword" required>
                </div>

                <!-- Need 1 input for birthday -->
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="inputPassword4" name="birthday" required>
                </div>
                <div class="col-12">
                    <p id="matched_error" style=" color: red; display: none;">Your password does not match!</p>
                </div>
                <div class="col-12">
                    <p id="password_error" style=" color: red; display: none;">Your password length needs to be at least
                        8 & contains at least 1 uppercase character & number!</p>
                </div>
                <div class="col-12">
                    <p style=" color: red; display: none;" id="email_error">Email Exist!</p>
                </div>
                <div class="col-12">
                    <p style=" color: red; display: none;" id="phone_error">Mobile Number Exist!</p>
                </div>
                <!-- End -->
                <div class="col-12">
                    <input type="submit" name="MM_insert" value="Register Now">
                </div>
            </form>

        </div>
    </div>
    <script src="JS/nav.js"></script>
    <script src="JS/register.js"></script>
</body>

</html>