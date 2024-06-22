<?php
require_once("../backend/connection.php");
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
    header("Location: ../frontend/login.php");
    exit();
}

$uid = $_SESSION["id"];
$sql = "SELECT * FROM cart WHERE userID = '$uid'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

if (empty($row['meals'])) {
    header("Location: ../frontend/cartEmpty.php");
    exit();
}

$sqlAddress = "SELECT * FROM address WHERE userID = '$uid'";
$resultAdd = mysqli_query($conn, $sqlAddress);

$mealArray = explode(',', $row["meals"]);
$quantityArray = explode(',', $row["quantity"]);
$total = 0.00;
$timestamp = time();
$formattedDateTime = date("Y-m-d H:i:s", $timestamp);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script>
        var mealArray = <?php echo json_encode($mealArray); ?>;
        var quantityArray = <?php echo json_encode($quantityArray); ?>;

        function updateQuantity(mealInd, curQuantity, action) {
            var newQuantity = action === "dec" ? curQuantity - 1 : curQuantity + 1;
            if (newQuantity < 1) {
                alert("Quantity cannot be less than 1.");
                return;
            }

            quantityArray[mealInd] = newQuantity;
            updateCart();
        }

        function removeMeal(mealInd) {
            mealArray.splice(mealInd, 1);
            quantityArray.splice(mealInd, 1);
            updateCart();
        }

        function updateCart() {
            var newMealString = mealArray.join(',');
            var newQuantityString = quantityArray.join(',');
            window.location.href = "../backend/updateCart.php?newM=" + newMealString + "&newQ=" + newQuantityString;
        }
    </script>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS links -->
    <link rel="stylesheet" href="../frontend/CSS/nav.css">
    <link rel="stylesheet" href="../frontend/CSS/style.css">
    <link rel="stylesheet" href="../frontend/CSS/viewCart.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!--nav bar-->
    <?php include("../frontend/nav.php"); ?>

    <h3 class="heading">Cart</h3>
    <form method="POST" action="../backend/checkOut.php">
        <div class="chooseaddress">
            <label for="address"> Choose an address: </label>
            <select name="address" id="address">
                <?php while ($rowAdd = $resultAdd->fetch_assoc()) { ?>
                    <option value="<?php echo $rowAdd["addressID"] ?>"><?php echo $rowAdd["addressName"] ?></option>
                <?php } ?>
            </select>
        </div>
        <table border="1px">
            <tr>
                <th>Meal Name</th>
                <th>Meal Price</th>
                <th>Meal Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>
            <?php
            for ($x = 0; $x < count($mealArray); $x++) {
                $mealID = $mealArray[$x];
                $sqlMeal = "SELECT * FROM meal WHERE mealID = '$mealID'";
                $result2 = mysqli_query($conn, $sqlMeal);
                $row2 = $result2->fetch_assoc();

                if ($row2) {
                    $price = floatval($row2["price"]); // Convert price to float
                    $quantity = intval($quantityArray[$x]); // Convert quantity to integer
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
            ?>
                    <tr>
                        <td><?php echo $row2["mealName"]; ?></td>
                        <td><?php echo $row2["price"]; ?></td>
                        <td>
                            <button type="button" onclick="updateQuantity(<?php echo $x; ?>, <?php echo $quantity; ?>, 'dec')">-</button>
                            <span id="quantity-<?php echo $x; ?>" class="quantity-number"><?php echo $quantity; ?></span>
                            <button type="button" onclick="updateQuantity(<?php echo $x; ?>, <?php echo $quantity; ?>, 'inc')">+</button>
                        </td>
                        <td>RM <span id="subtotal-<?php echo $x; ?>"><?php echo number_format($subtotal, 2); ?></span></td>
                        <td><button type="button" onclick="removeMeal(<?php echo $x; ?>)">Remove</button></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <input type="hidden" name="ordertime" value="<?php echo $formattedDateTime ?>">
        <input type="hidden" name="orderItems" value="<?php echo implode(',', $mealArray); ?>">
        <input type="hidden" name="orderQuantity" value="<?php echo implode(',', $quantityArray); ?>">
        <input type="hidden" name="totalAmount" value="<?php echo number_format($total, 2); ?>">
        <input type="hidden" name="orderUser" value="<?php echo $uid ?>">
        <div class="total-checkout">
            <h2>Total Payment : RM <span id="total"><?php echo number_format($total, 2); ?></span></h2>
            <input type="submit" name="MM_insert" value="Checkout">
        </div>
    </form>
</body>

</html>
