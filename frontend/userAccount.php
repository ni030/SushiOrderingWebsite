<?php
    session_start();
    if ($_SESSION["loggedin"] = FALSE){
        header("Location: ../login.php");
    }
    require_once("../backend/connection.php");
    $recordID = $_SESSION["id"];

    $sql = "SELECT * FROM user WHERE guid = '$recordID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id = "userProfile">
        <form method="POST" action="../backend/updateProfile.php">
        <table>
            <tr>
                <th>Name</th>
                <td><input type="text" name="firstName" value="<?php echo $row["firstName"] ?>"></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text" name="lastName" value="<?php echo $row["lastName"] ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $row["email"] ?></td>
            </tr>
            <tr>
                <th>Mobile Num</th>
                <td><?php echo $row["mobileNum"] ?></td>
            </tr>
            <tr colspan="2">
                <input type="hidden" name="email" value="<?php echo $row["email"]?>">
                <td><input type="submit" name="MM_Update" value="Save"></td>
            </tr>
        </table>
        </form>
    </div>
    <div id="changePassword">
        <form method="POST" action="../backend/changePassword.php">
            <table>
                <tr>
                    <th>Current Password</th>
                    <td><input type="text" name="currentPW"></td>
                </tr>
                <tr>
                    <th>New Password</th>
                    <td><input type="text" name="newPW"></td>
                </tr>
                <tr colspan="2">
                    <input type="hidden" name="email" value="<?php echo $row["email"]?>">
                    <td><input type="submit" name="MM_Update" value="Confirm"></td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>