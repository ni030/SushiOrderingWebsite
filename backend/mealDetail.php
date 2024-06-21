<?php
    require_once("connection.php");
    $recordID = $_GET["meal"];

    $sql = "SELECT * FROM meal WHERE mealID = '$recordID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

?>

<?php
    session_start();

    require_once("../backend/connection.php");

    $sql = "SELECT * FROM meal WHERE category = 'Promotion'";
    $result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="../frontend/CSS/mealDetail.css">
    <link rel="stylesheet" href="../frontend/CSS/nav.css">
    <link rel="stylesheet" href="../frontend/CSS/style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>

<body>
    <!--nav bar-->
    <?php
    include("../frontend/nav.php");
    ?>

    <div class="pagination">
        <p> Sushi details </p>
    </div>
    
    <!-- product section -->
<div class="meal-container">
    <div class="box" style="background-image: url('../frontend/img/detailBackground.png');">
        <!-- Left side: Meal Image -->
        <div class="meal-card">
            <img src="../frontend/img/<?php echo $row["mealPic"]?>" alt="Meal Image">
        </div>
        <!-- Right side: Meal Details -->
        <div class="meal-info">
            <h3><?php echo $row["mealName"]; ?></h3>
            <h3 class="price"><?php echo "each for RM " . $row["price"]; ?></h3>

            <form method="POST" action="addCart.php">
                <div class="quantity">
                    <span>Quantity: </span>
                    <div class="counter">
                        <button class="minus" onclick="changeQuantity('minus'); return false;" type="button">-</button>
                        <input type="text" class="" name="quantity" id="quantity" value="1">
                        <button class="plus" onclick="changeQuantity('plus'); return false;" type="button">+</button>
                    </div>
                </div>
                <input type="hidden" name="mealID" value="<?php echo $row['mealID']; ?>">
                <input type="submit" name="MM_update" value="Add to cart">
            </form>
        </div>
    </div>
</div>


    <!-- script tags -->
    <script src="../frontend/js/cart.js">

    </script>





</body>
</html>