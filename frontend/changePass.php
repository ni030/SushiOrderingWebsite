<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
    header("Location: login.php");
}
require_once("../backend/connection.php");
$recordID = $_SESSION["id"];

$sql = "SELECT * FROM user WHERE guid = '$recordID'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT * FROM address WHERE userID = '$recordID'";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * from orders WHERE orderUser = '$recordID'";
$result3 = mysqli_query($conn, $sql3)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <!--footer-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../frontend/CSS/footer.css">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- 这个暂时的罢了，之后design可以remove掉-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/side-bar.css" />
    <link rel="stylesheet" href="CSS/nav.css" />
    <link rel="stylesheet" href="CSS/changePass.css" />
    <script defer src="JS/nav.js"></script>
    <script defer src="JS/side-bar.js"></script>
    <script defer src="JS/changePass.js"></script>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <?php
    include("side-bar.php");
    ?>
    <div class="content d-flex">
        <div class="form-container">
            <h1>Change Password</h1>
            <form class="row g-3" method="POST" action="../backend/changePassword.php" id="change-form">
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Current Password:</label>
                    <input type="password" class="form-control" id="inputPassword4" name="currentPW" required>
                    <p id="current_error" style=" color: red; display: none;">Your current password is wrong!</p>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="inputPassword4" name="newPW" required>
                    <p id="password_error" style=" color: red; display: none;">Your password length needs to be at least
                        8 & contains at least 1 uppercase character & number!</p>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Confirm New Password:</label>
                    <input type="password" class="form-control" id="inputPassword4" name="confirmedPW" required>
                    <p id="matched_error" style=" color: red; display: none;">Your password does not match!</p>
                </div>

                <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                <div class="col-12">
                    <p id="tech_error" style=" color: red; display: none;">Sorry, there is some errors in the system!
                    </p>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" name="MM_Update" value="Confirm">
                </div>
            </form>
        </div>
    </div>
    <!--footer-->
    <?php
    include("footer.html");
    ?>
</body>