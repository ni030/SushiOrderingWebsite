<!--promotion-->
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Bliss Ordering Website</title>

        <!-- Font Awesome CDN link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!-- CSS links -->
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/nav.css">

        <script defer src="JS/nav.js"></script>
        <script defer src="JS/cart.js"></script>

        <style>
            body {
                background-color: #f4e7d4;
            }

            .promoheading {
                text-align: center;
                color: var(--red);
                font-size: 2.5rem;
                padding-top: 8rem;
                padding-bottom: 3rem;
                text-transform: uppercase;
            }

            .box .content h3 {
                padding-bottom:1rem;
                font-size: 0.8rem;
            }

            .prices {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        </style>

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

        <!-- Promotions section -->
        <section class="promotion" id="promotion">
            <h3 class="promoheading">limited time Promotions!</h3>
            <div class="box-container">
                <?php 
                    while($row = $result->fetch_assoc())
                    {
                ?>
                <div class="box">
                    <img src="img/<?php echo $row["mealPic"]; ?>" alt="">
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="sushi-name"><?php echo $row["mealName"]; ?></h3>
                        <p><?php echo $row["description"]; ?></p>
                        <div class="prices">
                            <span class="discounted-price">RM <?php echo $row["price"]; ?></span>
                            <span class="original-price">RM 5.50</span>
                        </div>
                        <a href="../backend/mealDetail.php?meal=<?php echo $row['mealID']; ?>" class="btn">Add to cart</a>
                    </div>
                </div>
                <?php 
                    }
                ?>
            </div>
        </section>
    </body>
</html>