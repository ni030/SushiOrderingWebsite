<?php
    require_once("connection.php");
    session_start();
    $uid = $_SESSION["id"];
    $newQuantity = $_GET["newQ"];
    $updateSQL = "UPDATE cart SET quantity = '$newQuantity' WHERE userID = '$uid'";
    $result2 = mysqli_query($conn, $updateSQL);

    if (!$result2) {
        die("Update failed: " . mysqli_error($conn));
    } else {
        echo "Record updated successfully";
        header("Location: ../frontend/viewCart.php");
    }
?>