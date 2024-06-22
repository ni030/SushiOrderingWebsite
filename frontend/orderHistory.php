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
    <div class="content d-flex">
        <?php
        include("side-bar.php");
        ?>
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
                        <div class="order-address"><?php
                            $curAddID = $row['addressID'];
                            $sql2 = "SELECT * FROM address WHERE addressID = '$curAddID'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = $result2->fetch_assoc();
                            echo $row2["addressName"] . " - ";
                            echo $row2["unit"] . ", " . $row2["address"] . " " . $row2["city"] . ", " . $row2["postcode"] . ", " . $row2["state"];
                        ?></div>
                    </div>
                    <div class="order-column">
                        <div class="order-amount"><?php echo "RM " . $row['totalAmount']; ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>


</html>
