<?php
require_once ("connection.php");

session_start();
$uid = $_SESSION["id"];
$sql = "SELECT * from orders WHERE orderUser = '$uid' ORDER BY ordertime DESC";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px">
        <tr>
            <th>Date</th>
            <th>Items</th>
            <th>Total amout</th>
            <th>Address</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['ordertime']; ?></td>
                <td>
                    <?php
                    $mealArray = explode(',', $row["orderItems"]);
                    $quantityArray = explode(',', $row["orderQuantity"]);

                    for ($x = 0; $x < count($mealArray); $x++) {
                        $mealID = $mealArray[$x];
                        $sqlMeal = "SELECT * FROM meal WHERE mealID = '$mealArray[$x]'";
                        $resultM = mysqli_query($conn, $sqlMeal);
                        $rowM = $resultM->fetch_assoc();
                        echo "<p>" . $rowM["mealName"] . "    " . $quantityArray[$x] . "</p>";
                    }

                    ?>
                </td>
                <td><?php echo $row['totalAmount']; ?></td>
                <td>
                    <?php
                    echo $row['address'] . "<br>";
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>