<?php
require_once("connection.php");
if (isset($_POST["MM_insert"]) && $_POST["MM_insert"] == "Save Address") {
    if (empty($_POST["name"]) || empty($_POST["unit"]) || empty($_POST["address"]) || empty($_POST["city"]) || empty($_POST["state"]) || empty($_POST["postcode"])) {
        exit("Have null value(s)");
    } else {
        $name = $_POST["name"];
        $unit = $_POST["unit"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $postcode = $_POST["postcode"];
        $id = $_POST["userID"];

        $sql = "INSERT INTO `address`(`addressName`, `unit`, `address`, `city`, `state`, `postcode`, `userID`) VALUES ('$name', '$unit', '$address', '$city', '$state', '$postcode', '$id')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            header("Location: ../frontend/userAccount.php?add=success");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
