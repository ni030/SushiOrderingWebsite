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

    <!--footer-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../frontend/CSS/footer.css">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!--Swiper-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!--link to css-->
    <link rel="stylesheet" href="CSS/menuPage.css">
    <link rel="stylesheet" href="CSS/nav.css">

    <script defer src="JS/nav.js"></script>
    <script defer src="JS/cart.js"></script>
</head>

<body>

    <!--nav bar-->
    <?php
    include("nav.php");
    ?>


    <!--menu-->
    <section class="menu" id="menu">

        <h3 class="sushi">SUSHI</h3>
        <div class="sushibox-container">
            <?php
            while ($row = $result->fetch_assoc()) {
                if ($row["category"] == 'Sushi') {
            ?>
                    <div class="box" id="Sushi">
                        <div class="image">
                            <img src="img/<?php echo $row["mealPic"]; ?>" alt="">
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3><?php echo $row["mealName"] ?></h3>
                            <p><?php echo $row["description"] ?></p>
                            <a href="../frontend/mealDetail.php?meal=<?php echo $row['mealID'] ?>" class="btn">Add to cart</a>
                            <span class="price">RM <?php echo $row["price"] ?></span>
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
            while ($row = $result->fetch_assoc()) {
                if ($row["category"] == 'Sides') {
            ?>
                    <div class="box" id="Sides">
                        <div class="image">
                            <img src="img/<?php echo $row["mealPic"]; ?>" alt="">
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3><?php echo $row["mealName"] ?></h3>
                            <p><?php echo $row["description"] ?></p>
                            <a href="../frontend/mealDetail.php?meal=<?php echo $row['mealID'] ?>" class="btn">Add to cart</a>
                            <span class="price">RM <?php echo $row["price"] ?></span>
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
            while ($row = $result->fetch_assoc()) {
                if ($row["category"] == 'Drinks') {
            ?>
                    <div class="box" id="Drinks">
                        <div class="image">
                            <img src="img/<?php echo $row["mealPic"]; ?>" alt="">
                        </div>
                        <div class="content">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <h3><?php echo $row["mealName"] ?></h3>
                            <p><?php echo $row["description"] ?></p>
                            <a href="../frontend/mealDetail.php?meal=<?php echo $row['mealID'] ?>" class="btn">Add to cart</a>
                            <span class="price">RM <?php echo $row["price"] ?></span>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <!--footer-->
    <?php
    include("footer.html");
    ?>
</body>

</html>