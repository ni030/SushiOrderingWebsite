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
    
</head>

<body>
    <!--nav bar-->
    <nav class="navbar">
            <div class="navbar-left">
                <div class="navbar-brand">
                    <a href="#" class="navbar-logo">
                        <img src="../frontend/img/logo.PNG" alt="Logo">
                    </a>
                    <span class="shop-name">Sushi Bliss</span>
                </div>
                <ul class="navbar-menu">
                    <li><a href="../frontend/index.php" id="home-link">Home</a></li>
                    <li><a href="../frontend/menuPage.php" id="menu-link">Menu</a></li>
                    <li><a href="../frontend/promotion.php" id="promotion-link">Promotion</a></li>
                </ul>
            </div>
            <div class="navbar-profile">
                <a href="../frontend/userAccount.php">
                    <div>
                        <?php
                        if ($_SESSION["loggedin"] === TRUE) {
                            echo "HI, " . $_SESSION["name"];
                        } else {
                            echo "Login";
                        }

                        if(!isset($_SESSION["loggedin"])) {
                            echo "Login";
                        }
                        ?>
                    </div>
                </a>

                <div class="navCart">
                    <a href="viewCart.php" id="cart-link">
                        <i style="margin-right: 1%;" class="fa-solid fa-cart-shopping justify-content-end fa-xl"></i>
                    </a>
                </div>  
            </div>
        </nav>



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
                <p>Quantity:  <input type="text" name="quantity" id="quantity"></input></p>
                <input type="hidden" name="mealID" value="<?php echo $row["mealID"]?>">
                <input type="submit" name="MM_update" value="Add to cart">
            </form>
        </div>
    </div>
</div>


    <!-- script tags -->
    <script src="js/cart.js"></script>





</body>
</html>