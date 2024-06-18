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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <!-- 这个暂时的罢了，之后design可以remove掉-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/side-bar.css" />
    <link rel="stylesheet" href="CSS/nav.css" />
    <link rel="stylesheet" href="CSS/address.css" />
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
    <div class="content">
        <p>Address</p>
        <?php
        while ($row2 = $result2->fetch_assoc()) {
        ?>
            <div id="address_slot" class="address_slot">
                <table>
                    <tr>
                        <td width="180px">
                            <p><?php echo $row2['addressName'] ?></p>
                            <p><?php echo $row2['unit'] . ', ' . $row2['address'] . ' ' . $row2['city'] . ', ' . $row2['postcode'] . ', ' . $row2['state']; ?>
                            </p>
                        </td>
                        <td width="20px">
                            <input type="hidden" name="userID" value="<?php echo $row2['userID'] ?>">
                        <td><a href="editAddress.php?id=<?php echo $row2['addressID'] ?>"><span class="material-symbols-outlined">edit</span></a></td>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
        }
        ?>
        <a href="addAddress.php"><button name="addAddress">Add a new address</button></a>
    </div>
    </div>
</body>