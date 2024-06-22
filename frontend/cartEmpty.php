<?php
require_once("../backend/connection.php");
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
    header("Location: ../frontend/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CartEmpty</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS links -->
    <link rel="stylesheet" href="../frontend/CSS/nav.css">
    <link rel="stylesheet" href="../frontend/CSS/style.css">
    <link rel="stylesheet" href="../frontend/CSS/viewCart.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-image: url('../frontend/img/cartBackground.png'); 
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center; 
        }

        .emptyheading{
            padding-top: 26rem;
            text-align: center;
            color:var(--red);
            font-size: 2.2rem;
            font-weight: bold;
            text-transform: uppercase;
}
        }
    </style>

</head>

<body>
    <!--nav bar-->
    <?php include("../frontend/nav.php"); ?>

    <h3 class="emptyheading">Opssy .. Your cart is empty!</h3>

    <div class="total-checkout">
            <h2>Total Payment : RM 0</h2>
            <input type="submit" name="MM_insert" value="Checkout">
        </div>

</body>

</html>
