<?php
session_start();
include 'connection.php';

function saveOrder($userID,$cart,$conn){
    $orderItems=[];
    $totalAmount=0;

    foreach($cart as $mealID => $mealQuantity){
        //Fetch meal details from the database
        $query = "SELECT mealName,mealPrice FROM meals WHERE mealID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam("i",$mealID);
        $stmt->execute();
        $result = $stmt->get_result();
        $meal = $result->fetch_assoc();

        $totalPrice = $meal['price']*$mealQuantity;
        $orderItems[] = $meal['mealName']." x". $mealQuantity;
        $totalAmount += $totalPrice;
    }

    $orderItemsStr = implode(", ",$orderItems);

    //Insert order into the database
    $query = "INSERT INTO orders (orderItem, totalAmount, userID) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam("sdi",$orderItemsStr,$totalAmount,$userID);
    $stmt->execute();

    //Clear the cart after saving the order
    $_SESSION['cart']=array();
    return true;
}

if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){
    if(saveOrder($userID,$_SESSION['cart'],$conn)){
        echo "Order has been placed successfully";
    }
    else{
        echo "Failed to place the order";
    }
}
else{
    header("Location: ../frontend/thankyou.php");
}

?>
