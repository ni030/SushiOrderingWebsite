<?php
require_once("connection.php");
session_start();

if (isset($_POST['add_to_cart'])=="Add to Cart"){
    if(!isset($_SESSIION['cart'])){
        $_SESSION['cart']=array();
    }

if (isset($_POST['mealID'])){
    $mealID=$_POST['$mealID'];
    $quantity = 1;

    if(isset($_SESSIION['cart'][$mealID])){
        $_SESSIION['cart'][$mealID] += $quantity;
    }
    else{
        $_SESSION['cart'][$mealID] = $quantity;
    }
}
}