<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="../backend/addNewAddress.php">
        <table>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>Unit</th>
                <td><input type="text" name="unit"></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <th>State</th>
                <td><input type="text" name="state"></td>
            </tr>
            <tr>
                <th>Postcode</th>
                <td><input type="text" name="postcode"></td>
            </tr>
            <tr colspan="2">
                <input type="hidden" name="userID" value="<?php session_start(); echo $recordID = $_SESSION["id"]; ?>">
                <td><input type="submit" name="MM_insert" value="Save Address"></td>
            </tr>
        </table>
    </form>
</body>
</html>