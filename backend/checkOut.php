<?php
require_once ("connection.php");

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Checkout")) {

    // Check for empty input(s)
    if (empty($_POST["orderItems"])) {
        exit("Empty cart");
    } else {
        $datetime = $_POST["ordertime"];
        $orderItem = $_POST["orderItems"];
        $orderQuantity = $_POST["orderQuantity"];
        $amount = $_POST["totalAmount"];
        $user = $_POST["orderUser"];
        $address = $_POST["address"]; 

        $sql = "INSERT INTO `orders`(`ordertime`, `orderItems`, `orderQuantity`, `totalAmount`, `orderUser`, `address`) VALUES ('$datetime', '$orderItem', '$orderQuantity', '$amount', '$user', '$address')";

        if ($conn->query($sql) === TRUE) {
            $newMeal = "";
            $newQuantity = "";
            $updateSQL = "UPDATE cart SET meals = '$newMeal', quantity = '$newQuantity' WHERE userID = '$user'";
            $result2 = mysqli_query($conn, $updateSQL);

            echo "New record created successfully";
            header("Location: ../frontend/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>