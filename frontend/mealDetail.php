<?php
require_once ("../backend/connection.php");
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../frontend/login.php");
    exit();
}

$recordID = $_GET["meal"];

$sql = "SELECT * FROM meal WHERE mealID = '$recordID'";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("Meal not found for meal ID: $recordID");
}
$row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="../frontend/CSS/style.css">
    <link rel="stylesheet" href="../frontend/CSS/mealDetail.css">
    <link rel="stylesheet" href="../frontend/CSS/nav.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Notification CSS -->
    <style>
        .notification {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #56282c; 
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        text-align: center;
        font-size: 2em; 
        font-weight: bold; 
        }

        .notification i {
            margin-right: 15px; 
            font-size: 1.5em; 
        }
    </style>
</head>

<body>
    <!-- Notification Container -->
    <div id="notification" class="notification">
        <i class="fas fa-check-circle"></i> <strong>Successfully added</strong>
    </div>

    <!--nav bar-->
    <?php
    include ("../frontend/nav.php");
    ?>

    <!-- product section -->
    <div class="meal-container">
        <div class="box" style="background-image: url('../frontend/img/detailBackground.png');">
            <!-- Left side: Meal Image -->
            <div class="meal-card">
                <img src="../frontend/img/<?php echo $row["mealPic"] ?>" alt="Meal Image">
            </div>
            <!-- Right side: Meal Details -->
            <div class="meal-info">
                <div class="pagination"> Meal details </div>
                <p><?php echo $row["mealName"]; ?></p>
                <div class="mealType">
                    <?php
                    if ($row["category"] == "Promotion") {
                        echo "<h3 style=\"color:#DC143C;\">&#129395 Hurry!! In PROMOTION! </h3>";
                    } else {
                        echo "<h2> Category :  " . $row["category"] . "</h2>";
                    }
                    ?>
                </div>
                <p class="price"><?php echo "each for RM " . $row["price"]; ?></p>

                <form id="add-to-cart-form" method="POST" action="../backend/addCart.php">
                    <div class="quantity">
                        <span>Quantity: </span>
                        <div class="counter">
                            <button class="minus" onclick="changeQuantity('minus')" type="button">-</button>
                            <input type="text" class="" name="quantity" id="quantity" value="1">
                            <button class="plus" onclick="changeQuantity('plus')" type="button">+</button>
                        </div>
                    </div>
                    <input type="hidden" name="mealID" value="<?php echo $row['mealID']; ?>">
                    <input type="submit" name="MM_update" value="Add to cart"> 
                </form>
            </div>
        </div>
    </div>

    <!-- script tags -->
    <script src="../frontend/JS/cart.js"></script>
    <script>
        document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.action, true);

            xhr.onload = function() {
                if (xhr.status === 200) {

                    var notification = document.getElementById('notification');
                    notification.style.display = 'block';

                    setTimeout(function() {
                        notification.style.display = 'none';
                        window.location.href = '../frontend/index.php';
                    }, 2500);
                    
                } else {
                    alert('An error occurred while adding to the cart. Please try again.');
                }
            };

            xhr.send(formData);
        });
    </script>

</body>

</html>
