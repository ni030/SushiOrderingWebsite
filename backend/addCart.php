<?php
require_once ("connection.php");
session_start();

$uid = $_SESSION["id"];
$sql2 = "SELECT * FROM cart WHERE userID = '$uid'";
$result2 = mysqli_query($conn, $sql2);
$row2 = $result2->fetch_assoc();

if (isset($_POST["MM_update"]) && $_POST["MM_update"] == "Add to cart") {
    $newMealList;
    $newQuantityList;
    $mealExists = false;

    // Get meals and quantity from the table
    $mealsArray = explode(",", $row2["meals"]);
    $quantityArray = explode(",", $row2["quantity"]);

    // Loop to check if the mealID already exists
    foreach ($mealsArray as $index => $mealID) {
        if ($mealID == $_POST["mealID"]) {
            // If exists, update the quantity
            $quantityArray[$index] = intval($quantityArray[$index]) + intval($_POST["quantity"]);
            $mealExists = true;
            break;
        }
    }

    if (!$mealExists) {
        // If the mealID does not exist, add it to the lists
        $mealsArray[] = $_POST["mealID"];
        $quantityArray[] = $_POST["quantity"];
    }

    // Convert arrays back to strings
    $newMealList = implode(",", $mealsArray);
    $newQuantityList = implode(",", $quantityArray);

    // Update the database
    $updateSQL = "UPDATE cart SET meals='$newMealList', quantity='$newQuantityList' WHERE userID = '$uid'";
    $resultUpdate = mysqli_query($conn, $updateSQL);

    if (!$resultUpdate) {
        die("Update failed: " . mysqli_error($conn));
    } else {
        echo "Record updated successfully";
        header("Location: ../frontend/index.php");
    }
}
?>