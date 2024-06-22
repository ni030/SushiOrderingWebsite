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

    <!--footer-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../frontend/CSS/footer.css">
    <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

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
        font-weight: bold;
    }

    .box .content h3 {
        padding-bottom: 1rem;
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
    <?php
    include("nav.php");
    ?>

    <!-- Promotions section -->
    <section class="promotion" id="promotion">
        <h3 class="promoheading">limited time Promotions!</h3>
        <div class="box-container">
            <?php
            while ($row = $result->fetch_assoc()) {
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
                    <a href="../frontend/mealDetail.php?meal=<?php echo $row['mealID']; ?>" class="btn">Add to cart</a>
                </div>
            </div>
            <?php
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