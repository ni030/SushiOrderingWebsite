<?php
    session_start();
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
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

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
                                Ideal for gatherings and family meals where everyone can enjoy a taste of Japan together.</p>
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
                    <div class="box">
                        <img src="img/promo1.png" alt="">
                        <p>Ebi</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="discounted-price">RM 2.99</span>
                            <span class="original-price">RM 5.50</span>
                        </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
    
                    <div class="box">
                        <img src="img/promo2.png" alt="">
                        <p>Ikura</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="discounted-price">RM 2.50</span>
                            <span class="original-price">RM 5.00</span>
                        </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
    
                    <div class="box">
                        <img src="img/promo3.png" alt="">
                        <p>Hamachi</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="prices">
                            <span class="discounted-price">RM 2.20</span>
                            <span class="original-price">RM 4.99</span>
                        </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
    
                    <div class="box">
                        <img src="img/promo4.png" alt="">
                        <p>Futomaki</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="discounted-price">RM 2.50</span>
                            <span class="original-price">RM 3.99</span>
                        </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
    
                </div>

        </section>







        <!--menu-->
        <section class="menu" id="menu">
            <h3 class="sub-heading"> enjoy the taste of japan</h3>
            <h3 class="heading"> Menu</h3>

            <div class="box-container">
                <div class="box">
                    <div class="image">
                        <img src="img/menu1.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Tobiko</h3>
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 3.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu2.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu3.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.99</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu4.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 4.20</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu5.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Tobiko</h3>
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 3.50</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu6.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Shishimi</h3>
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 4.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu7.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 5.60</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu8.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM2.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu9.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu10.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Kappa Set</h3>
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.20</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu11.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
                    </div>
                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3>Taiyaki</h3>
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 6.80</span>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="img/menu12.png" alt="">
                        <a href="#" class="fas fa-heart"></a>  
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
                        <p>dsffdsjfdskjfsdjfsoijedfisjdfjsidfsifjdisdjfsdjfsdj</p>
                        <a href="#" class="btn">Add to cart</a>
                        <span class="price">RM 2.00</span>
                    </div>
                </div>
            </div>

        </section>




       
        <!--swiper js-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!--link to JS-->
        <script src="main.js"> </script>

    </body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <a href="userAccount.php">
        <div>
            <?php
            if ($_SESSION["loggedin"] === TRUE) {
                echo "HI, ".$_SESSION["name"];
            }else{
                echo "Login";
            }
            ?>
        </div>
    </a>
    
</body>
</html> -->