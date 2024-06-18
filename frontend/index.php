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

    <!--Swiper-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!--link to css-->
    <link rel="stylesheet" href="CSS/style.css">

    <link rel="stylesheet" href="CSS/nav.css">
    <script defer src="js/nav.js"></script>

    <!-- jQuery CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <!-- Nav bar file import -->
    <!-- <script>
    $(document).ready(function() {
        $("#includedContent").load("nav.html");
    });
    </script> -->
</head>

<body>
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

    <!-- Home section -->
    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Our Specials, only at RM 59.90</span>
                        <h3>Family Feast Combo</h3>
                        <p>our Family Feast Combo includes a generous assortment of sushi rolls,
                            sashimi, nigiri, and a variety of sides.
                            Ideal for gatherings and family meals where everyone can enjoy a taste of Japan together.
                        </p>
                        <a href="#" class="btn">Order now</a>
                    </div>
                    <div class="image">
                        <img src="img/home1.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Our Specials, only at RM 29.90</span>
                        <h3>Solo Savory Combo</h3>
                        <p>Tailored for sushi enthusiasts dining alone or
                            with a companion. It features a selection of sushi rolls,
                            nigiri, and a side dish, ensuring a satisfying and delightful
                            meal experience for one or two people.</p>
                        <a href="#" class="btn">Order now</a>
                    </div>
                    <div class="image">
                        <img src="img/home2.png" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Our Specials, only at RM 79.90</span>
                        <h3>Sashimi Sensation Combo</h3>
                        <p>Indulge in the exquisite flavors of our Sashimi Sensation Combo,
                            showcasing the freshest cuts of sashimi meticulously prepared by
                            our skilled chefs. This combo is designed to delight sashimi
                            aficionados with its premium selection and artful presentation.</p>
                        <a href="#" class="btn">Order now</a>
                    </div>
                    <div class="image3">
                        <img src="img/home3.png" alt="">
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </section>

    <!--Promotions-->
    <section class="promotion" id="promotion">
        <h3 class="sub-heading"> our exclusive</h3>
        <h3 class="heading"> Promotions</h3>

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

    <!--menu-->
    <section class="menu" id="menu">
        <h3 class="sub-heading"> enjoy the taste of japan</h3>
        <h3 class="heading"> Menu</h3>

        <!--Menu bar-->
        <div class="menu-bar">
            <button class="menu-button" id="sushi-btn" onclick="chooseCategory('Sushi')">Sushi</button>
            <button class="menu-button" id="sides-btn" onclick="chooseCategory('Sides')">Sides</button>
            <button class="menu-button" id="drinks-btn" onclick="chooseCategory('Drinks')">Drinks</button>
        </div>

        <!--Menu scroll-->
        <div class="box-wrap">
            <img src="img/leftArr.png" id="leftBtn">

            <div class="box-container" id="meal-container">
            <?php 
                while($row = $result->fetch_assoc())
                {
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
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM <?php echo $row["price"]?></span>
                    </div>
                </div>
                <?php 
                    }
                ?>
               
            </div>
            <img src="img/rightArr.png" id="rightBtn">
        </div>

    </section>
    <script>
            function chooseCategory(category) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("meal-container").innerHTML = xhr.responseText;
                    } else {
                        console.error('Error fetching meals:', xhr.status);
                    }
                }
            };
        
        xhr.open('GET', '../backend/selectMenu.php?category=' + category, true);
        xhr.send();
        }
    </script>

    <!--swiper js-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--link to JS-->
    <script src="JS/main.js"> </script>

</body>

</html>