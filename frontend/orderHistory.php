<?php
require_once("../backend/connection.php");

session_start();
$uid = $_SESSION["id"];

$sql = "SELECT * from orders WHERE orderUser = '$uid' ORDER BY orderTime DESC";
$result = mysqli_query($conn, $sql);
$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="CSS/nav.css" />
    <link rel="stylesheet" href="CSS/side-bar.css" />
    <link rel="stylesheet" href="CSS/order.css" />
    <script defer src="JS/nav.js"></script>
    <script defer src="JS/side-bar.js"></script>
    <script defer src="JS/orderHistory.js"></script>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <?php
        include("side-bar.php");
        ?>
    <div class="content d-flex">
        <div id="historySection">
            <div class="history-header">
                <h1>My Order</h1>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-sort"></i> Sort
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li>
                            <input type="radio" name="sortOption" id="sortLatest" value="latest" checked>
                            <label for="sortLatest">Newest to Oldest</label>
                        </li>
                        <li>
                            <input type="radio" name="sortOption" id="sortOldest" value="oldest">
                            <label for="sortOldest">Oldest to Newest</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-list" id="orderList">
                <?php foreach ($orders as $row) { ?>
                <div class="order">
                    <div class="order-details">
                        <div class="order-time"><?php echo substr($row['ordertime'], 0, 19); ?></div>
                        <div class="order-item"><?php
                                                    $mealArray = explode(',', $row["orderItems"]);
                                                    $quantityArray = explode(',', $row["orderQuantity"]);

                                                    for ($x = 0; $x < count($mealArray); $x++) {
                                                        $mealID = $mealArray[$x];
                                                        $sqlMeal = "SELECT * FROM meal WHERE mealID = '$mealArray[$x]'";
                                                        $resultM = mysqli_query($conn, $sqlMeal);
                                                        $rowM = $resultM->fetch_assoc();
                                                        echo "<p>" . $rowM["mealName"] . " x " . $quantityArray[$x] . "</p>";
                                                    }
                                                    ?></div>
                        <div class="order-address"><?php echo $row["address"]; ?></div>
                    </div>
                    <div class="order-column">
                        <div class="order-amount"><?php echo "RM " . $row['totalAmount']; ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>
</body>


</html>