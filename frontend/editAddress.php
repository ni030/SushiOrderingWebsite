<?php
    require_once("../backend/connection.php");
    $recordID = $_GET["id"];

    $sql = "SELECT * FROM address WHERE addressID= '$recordID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    if((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "Save")){
        if(empty($_POST["name"]) || empty($_POST["unit"]) || empty($_POST["address"])){
            exit("Have null value(s)");
        }else{
            $name = $_POST["name"];
            $unit = $_POST["unit"];
            $address = $_POST["address"];

            $updateSQL = "UPDATE address SET addressName = '$name', unit = '$unit', address='$address' WHERE addressID = '$recordID'";
            $result2 = mysqli_query($conn, $updateSQL);
            if (!$result2) {
                die("Update failed: " . mysqli_error($conn));
            } else {
                echo "Record updated successfully";
                header("Location: userAccount.php");
            }
        }
    }

    if((isset($_POST["MM_delete"])) && ($_POST["MM_delete"] == "Remove")){ 

        $delSQL = "DELETE FROM address WHERE addressID = '$recordID'";
        $result2 = mysqli_query($conn, $delSQL);
        if (!$result2) {
            die("Dlete failed: " . mysqli_error($conn));
        } else {
            echo "Record deleted successfully";
            header("Location: userAccount.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $row["addressName"]?>" ></td>
            </tr>
            <tr>
                <td>Unit</td>
                <td><input type="text" name="unit" value="<?php echo $row["unit"]?>" ></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $row["address"]?>" ></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php echo $row["city"];?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo $row["state"];?></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><?php echo $row["postcode"];?></td>
            </tr>
            <tr>
                <td><input type="submit" name="MM_update" value="Save"></td>
                <td><input type="submit" name="MM_delete" value="Remove"></td>
            </tr>
        </table>
    </form>
</body>
</html>