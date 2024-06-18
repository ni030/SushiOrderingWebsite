<?php
require_once("connection.php");
session_start();

$uid = $_SESSION["id"];
$sql2 = "SELECT * FROM cart WHERE userID = '$uid'";
$result2 = mysqli_query($conn, $sql2);
$row2= $result2->fetch_assoc();

if (isset($_POST["MM_update"]) && $_POST["MM_update"] == "Add to cart") {
    $newMealList;
    $newQuantityList;
    
    if($row2["meals"] == ""){
        $newMealList = $_POST["mealID"];
    }else{
        $newMealList = $row2["meals"].",".$_POST["mealID"];
    }

    if($row2["quantity"] == ""){
        $newQuantityList = $_POST["quantity"];
    }else{
        $newQuantityList = $row2["quantity"].", ".$_POST["quantity"];
    }

    $updateSQL = "UPDATE cart SET meals='$newMealList' WHERE userID = '$uid'";
    $resultUpdate = mysqli_query($conn, $updateSQL);

    $updateSQL2 = "UPDATE cart SET quantity='$newQuantityList' WHERE userID = '$uid'";
    $resultUpdate2 = mysqli_query($conn, $updateSQL2);


    if (!$resultUpdate) {
        die("Update failed: " . mysqli_error($conn));
    } else {
        echo "Record updated successfully";
        header("Location: ../frontend/index.php");
    }
}

?>