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
    <title>Add Address</title>
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
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/side-bar.css" />
    <link rel="stylesheet" href="CSS/nav.css" />
    <link rel="stylesheet" href="CSS/addAddress.css" />
    <script defer src="JS/nav.js"></script>
    <script defer src="JS/side-bar.js"></script>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <?php
    include("side-bar.php");
    ?>
    <div class="content d-flex">
        <div id="addSection">
            <h1>Add New Address</h1>
            <form class="row g-3" method="POST" action="../backend/addNewAddress.php" id="addForm">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Saved Place Name:</label>
                    <input type="text" class="form-control" id="validationDefault01" name="name" required>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Unit:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="unit" required>
                </div>

                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="address" required>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">City:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="city" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">State:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="state" required>
                </div>
                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Postcode:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="postcode" required>
                </div>

                <input type="hidden" name="userID" value="<?php echo $recordID; ?>">
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" name="MM_insert" value="Save Address">
                </div>
            </form>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>
</body>

</html>