<?php
    session_start();

    require_once("../backend/connection.php");
    $sql = "SELECT * FROM meal";
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM meal WHERE category = 'Promotion'";
    $result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html lang="'en">
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

        <!--menu-->
        <section class="menu" id="menu">

            <h3 class="sushi">       SUSHI </h3>
            <div class="sushibox-container">
                
                <div class="box" id="bostonRoll">
                    <div class="image">
                        <img src="img/bostonRoll.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Boston roll</h3>
                        <p>Colorful fish roe.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 3.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/tomago.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Tomago</h3>
                        <p>Elegant, luxury Swiss watches.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/kani.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Kani</h3>
                        <p>crab meat made from fish</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/unagi.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Unagi</h3>
                        <p>Grilled freshwater eel.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 4.20</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/gunkan.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Gunkan</h3>
                        <p>Seaweed-wrapped sushi delight.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 3.50</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/uramaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Uramaki</h3>
                        <p>Inside-out sushi rolls</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 4.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/tunaOni.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Tuna Onigiri</h3>
                        <p>Rice stuffed with tuna</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 5.60</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/avocadoMaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Avocado maki</h3>
                        <p>Rolled avocado sushi.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM2.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/miCombo.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Maki Inari Combo</h3>
                        <p>Sushi roll, tofu pockets.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/makiSet.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Maki Set</h3>
                        <p>sushi roll set.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.20</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/eelmaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Eel Maki</h3>
                        <p>Rolled freshwater eel</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 4.30</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/kappaRoll.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Kappa roll</h3>
                        <p>Cucumber sushi roll.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 3.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/gunkanmaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Gunkan Maki</h3>
                        <p> Gunkan style sushi.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/salmonOni.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Salmon Onigiri</h3>
                        <p>Rice stuffed with salmon.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.60</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/fishOni.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Fish Onigiri</h3>
                        <p>Rice stuffed with fish.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 5.50</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/sashimiTemaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Sashimi Temaki</h3>
                        <p>Hand-rolled sashimi cone.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 5.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/vegeTemaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Vege Temaki</h3>
                        <p>Vegetable hand rolls.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 4.90</span>
                    </div>
                </div>

            </div>

            <h3 class="sides">       SIDES </h3>


            <div class="sidesbox-container">
                <div class="box" id="chocoTaiyaki">
                    <div class="image">
                        <img src="img/chocoTaiyaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Choco Taiyaki</h3>
                        <p>Chocolate-filled fish cake.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/matcha.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Matcha Taiyaki</h3>
                        <p>Matcha-filled fish cake.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/vanilla.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Vanilla Taiyaki</h3>
                        <p>Vanilla-filled fish cake.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/matchaCake.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Uji-matcha Cake</h3>
                        <p>Matcha-flavored cake delight.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 9.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/mochi.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>RedBean Mochi</h3>
                        <p>Sweet red bean mochi.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 5.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/daifuku.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Daifuku</h3>
                        <p>Strawberry stuffed mochi.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 7.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/takoyaki.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Takoyaki</h3>
                        <p>Octopus-filled savory balls.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.30</span>
                    </div>
                </div>
            </div>


            <h3 class="drinks">       DRINKS </h3>

            <div class="drinksbox-container">

                <div class="box" id="hotMatcha">
                    <div class="image">
                        <img src="img/hotmatcha.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Hot Matcha</h3>
                        <p>Hot brewed green tea.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.00</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/hotchoco.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Hot Chocolate</h3>
                        <p>Warm chocolate drink.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/matchalatte.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Iced matcha Latte</h3>
                        <p>Cold matcha milk drink.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 8.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/OrenCocktail.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Oren Cocktail</h3>
                        <p>Refreshing orange cocktail.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 12.90</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/wCocktail.png" alt="">  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Watermelon Cocktail</h3>
                        <p>Refreshing watermelon drink.</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 12.90</span>
                    </div>
                </div>

            </div>
            </div>

        </section>

    </body>

</html>