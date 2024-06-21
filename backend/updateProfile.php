<?php
require_once("connection.php");
session_start();
if (isset($_POST["MM_Update"]) && $_POST["MM_Update"] == "Save") {
    if (empty($_POST["firstName"]) || empty($_POST["lastName"])) {
        exit("Have null value(s)");
    } else {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $updateSQL = "UPDATE user SET firstName='$firstName', lastName = '$lastName' WHERE email = '$email'";

        $result = mysqli_query($conn, $updateSQL);

        if (!$result) {
            die("Update failed: " . mysqli_error($conn));
        } else {
            echo "Record updated successfully";
            header("Location: ../frontend/userAccount.php?update=success");
        }
    }
}

$conn->close();
