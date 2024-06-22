<?php
require_once("../backend/connection.php");
$recordID = $_GET["id"];

$sql = "SELECT * FROM address WHERE addressID= '$recordID'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "Save")) {
    if (empty($_POST["name"]) || empty($_POST["unit"]) || empty($_POST["address"])) {
        exit("Have null value(s)");
    } else {
        $name = $_POST["name"];
        $unit = $_POST["unit"];
        $address = $_POST["address"];

        $updateSQL = "UPDATE address SET addressName = '$name', unit = '$unit', address='$address' WHERE addressID = '$recordID'";
        $result2 = mysqli_query($conn, $updateSQL);
        if (!$result2) {
            die("Update failed: " . mysqli_error($conn));
        } else {
            // echo "Record updated successfully";
            header("Location: userAccount.php?edit=success");
        }
    }
}

if ((isset($_POST["MM_delete"])) && ($_POST["MM_delete"] == "Remove")) {

    $delSQL = "DELETE FROM address WHERE addressID = '$recordID'";
    $result2 = mysqli_query($conn, $delSQL);
    if (!$result2) {
        die("Dlete failed: " . mysqli_error($conn));
    } else {
        echo "Record deleted successfully";
        header("Location: userAccount.php?remove=success");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>
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
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/side-bar.css" />
    <link rel="stylesheet" href="CSS/nav.css" />
    <link rel="stylesheet" href="CSS/edit.css" />
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
        <div id="editSection">
            <h1>Edit Address</h1>
            <form class="row g-3" method="POST" id="editForm">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="validationDefault01" name="name"
                        value="<?php echo $row['addressName'] ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Unit:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="unit"
                        value="<?php echo $row["unit"] ?>" required>
                </div>

                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="address"
                        value="<?php echo $row["address"] ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">City:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="city"
                        value="<?php echo $row["city"] ?>" disabled>
                </div>

                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">State:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="state"
                        value="<?php echo $row["state"] ?>" disabled>
                </div>

                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Postcode:</label>
                    <input type="text" class="form-control" id="validationDefault02" name="postcode"
                        value="<?php echo $row['postcode'] ?>" disabled>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <input type="submit" name="MM_Update" value="Save" id="save">
                    <input type="submit" name="MM_delete" value="Remove" id="remove">
                </div>
            </form>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>
</body>

</html>