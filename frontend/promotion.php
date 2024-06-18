<!--promotion-->
<?php
    session_start();

    require_once("../backend/connection.php");
    $sql = "SELECT * FROM meal";
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM meal WHERE category = 'Promotion'";
    $result2 = mysqli_query($conn, $sql2);
?>
?>

<!DOCTYPE html>
<html lang="'en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width ,initial-scale=1.0">
        <title>Sushi Bliss Ordering Website</title>

        <!--link to css-->
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/nav.css">

        <script defer src="js/nav.js"></script>

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
            </div>
        </nav>

    <!--promos-->
    <section class="promotion" id="promotion">
        <h3 class="promoheading"> limited time Promotions !</h3>

        <div class="box-container">
            <?php 
                while($row2 = $result2->fetch_assoc())
                {
            ?>
            <div class="box">
                <img src="img/<?php echo $row2["mealPic"];?>" alt="">
                <p><?php echo $row2["mealName"]?></p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="prices">
                    <span class="discounted-price">RM <?php echo $row2["price"]?></span>
                    <span class="original-price">RM 5.50</span>
                </div>
                <a href="#" class="btn">add to cart</a>
            </div>
            <?php 
                }
            ?>
        </div>

    </section>
        

    </body>

</html>