<?php
require_once ("../backend/connection.php");
$recordID = $_GET["meal"];

$sql = "SELECT * FROM meal WHERE mealID = '$recordID'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Detail</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS links -->
    <link rel="stylesheet" href="../frontend/CSS/style.css">
    <link rel="stylesheet" href="../frontend/CSS/mealDetail.css">
    <link rel="stylesheet" href="../frontend/CSS/nav.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <!--nav bar-->
    <?php
    include ("../frontend/nav.php");
    ?>

    <!-- product section -->
    <div class="meal-container">
        <div class="box" style="background-image: url('../frontend/img/detailBackground.png');">
            <!-- Left side: Meal Image -->
            <div class="meal-card">
                <img src="../frontend/img/<?php echo $row["mealPic"] ?>" alt="Meal Image">
            </div>
            <!-- Right side: Meal Details -->
            <div class="meal-info">
                <div class="pagination"> Meal details </div>
                <p><?php echo $row["mealName"]; ?></p>
                <div class="mealType">
                    <?php
                    if ($row["category"] == "Promotion") {
                        echo "<h3 style=\"color:#DC143C;\">&#129395 Hurry!! In PROMOTION! </h3>";
                    } else {
                        echo "<h2> Category :  " . $row["category"] . "</h2>";
                    }
                    ?>
                </div>
                <p class="price"><?php echo "each for RM " . $row["price"]; ?></p>

                <form method="POST" action="../backend/addCart.php">
                    <div class="quantity">
                        <span>Quantity: </span>
                        <div class="counter">
                            <button class="minus" onclick="changeQuantity('minus')" type="button">-</button>
                            <input type="text" class="" name="quantity" id="quantity" value="1">
                            <button class="plus" onclick="changeQuantity('plus')" type="button">+</button>
                        </div>
                    </div>
                    <input type="hidden" name="mealID" value="<?php echo $row['mealID']; ?>">
                    <input type="submit" name="MM_update" value="Add to cart">
                </form>
            </div>
        </div>
    </div>


    <!-- script tags -->
    <script src="../frontend/JS/cart.js"></script>

</body>

</html>