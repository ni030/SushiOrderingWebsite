<?php
    session_start();
    require_once("../backend/connection.php");
    $sql = "SELECT * FROM meal";
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM meal WHERE category = 'Promotion'";
    $result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width ,initial-scale=1.0">
        <title>Sushi Bliss Ordering Website</title>

        <!--Swiper-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!--link to css-->
        <link rel="stylesheet" href="CSS/menuPage.css">
        <link rel="stylesheet" href="CSS/nav.css">

        <script defer src="js/nav.js"></script>
        <script defer src="js/cart.js"></script>
    </head>

    <body>

    <!--nav bar-->
    <nav class="navbar">
            <div class="navbar-left">
                <div class="navbar-brand">
                    <a href="#" class="navbar-logo">
                        <img src="img/logo.PNG" alt="Logo">
                    </a>
                    <span class="shop-name">Sushi Bliss</span>
                </div>
                <ul class="navbar-menu">
                    <li><a href="index.php" id="home-link">Home</a></li>
                    <li><a href="menuPage.php" id="menu-link">Menu</a></li>
                    <li><a href="promotion.php" id="promotion-link">Promotion</a></li>
                </ul>
            </div>
            <div class="navbar-profile">
                <a href="userAccount.php">
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
                    <a href="../backend/viewCart.php" id="cart-link">
                        <i style="margin-right: 1%;" class="fa-solid fa-cart-shopping justify-content-end fa-xl"></i>
                    </a>
                </div>  
            </div>
        </nav>
        

        <!--menu-->
        <section class="menu" id="menu">

            <h3 class="sushi">SUSHI</h3>
            <div class="sushibox-container">
                <?php 
                    while($row = $result->fetch_assoc())
                    {
                        if ($row["category"] == 'Sushi') {
                ?>
                <div class="box" id="Sushi">
                    <div class="image">
                        <img src="img/<?php echo $row["mealPic"];?>" alt="">
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3><?php echo $row["mealName"]?></h3>
                        <p><?php echo $row["description"]?></p>
                        <a href="../backend/mealDetail.php?meal=<?php echo $row['mealID']?>" class="btn">Add to cart</a>
                        <span class="price">RM <?php echo $row["price"]?></span>
                    </div>
                </div>
                <?php 
                        }
                    }
                ?> 
            </div>

            <h3 class="sides">SIDES</h3>
            <div class="sidesbox-container">
                <?php 
                    $result->data_seek(0); // Reset result pointer
                    while($row = $result->fetch_assoc())
                    {
                        if ($row["category"] == 'Sides') {
                ?>
                <div class="box" id="Sides">
                    <div class="image">
                        <img src="img/<?php echo $row["mealPic"];?>" alt="">
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3><?php echo $row["mealName"]?></h3>
                        <p><?php echo $row["description"]?></p>
                        <a href="../backend/mealDetail.php?meal=<?php echo $row['mealID']?>" class="btn">Add to cart</a>
                        <span class="price">RM <?php echo $row["price"]?></span>
                    </div>
                </div>
                <?php 
                        }
                    }
                ?> 
            </div>

            <h3 class="drinks">DRINKS</h3>
            <div class="drinksbox-container">
                <?php 
                    $result->data_seek(0); // Reset result pointer
                    while($row = $result->fetch_assoc())
                    {
                        if ($row["category"] == 'Drinks') {
                ?>
                <div class="box" id="Drinks">
                    <div class="image">
                        <img src="img/<?php echo $row["mealPic"];?>" alt="">
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3><?php echo $row["mealName"]?></h3>
                        <p><?php echo $row["description"]?></p>
                        <a href="../backend/mealDetail.php?meal=<?php echo $row['mealID']?>" class="btn">Add to cart</a>
                        <span class="price">RM <?php echo $row["price"]?></span>
                    </div>
                </div>
                <?php 
                        }
                    }
                ?> 
            </div>
        </section>
    </body>
</html>