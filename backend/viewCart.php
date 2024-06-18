<?php
require_once ("connection.php");
session_start();

$uid = $_SESSION["id"];
$sql = "SELECT * FROM cart WHERE userID = '$uid'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

if ($row['meals'] == null) {
    exit("Cart not found.");
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

            var newQuantityArray = [...quantityArray];
            newQuantityArray[mealInd] = newQuantity;
            console.log(newQuantityArray);

            var newQuantityString = newQuantityArray.join(',');
            console.log(newQuantityString);

            window.location.href = "updateQuantity.php?newQ=" + newQuantityString;
        }

        function removeMeal(mealInd) {
            var newMealArray = [...mealArray];
            var newQuantityArray = [...quantityArray];

            for (let x = mealInd; x < mealArray.length - 1; x++) {
                newMealArray[x] = mealArray[x + 1];
                newQuantityArray[x] = quantityArray[x + 1];
            }

            // Adjust array lengths
            newMealArray.length = mealArray.length - 1;
            newQuantityArray.length = quantityArray.length - 1;

            console.log("New Meal Array:", newMealArray);
            console.log("New Quantity Array:", newQuantityArray);

            var newMealString = newMealArray.join(',');
            var newQuantityString = newQuantityArray.join(',');

            console.log("New Meal String:", newMealString);
            console.log("New Quantity String:", newQuantityString);

            window.location.href = "updateCart.php?newM=" + newMealString + "&newQ=" + newQuantityString;
        }
    </script>
</head>

<body>
    <?php echo "Hi, " . $uid; ?>
    <form method="POST" action="../backend/checkOut.php">
        <label for="address">Choose an address:</label>
        <select name="address" id="address">
            <?php
            while ($rowAdd = $resultAdd->fetch_assoc()) {
                ?>
                <option value="<?php echo $rowAdd["addressID"] ?>"><?php echo $rowAdd["addressName"] ?></option>
            <?php } ?>
        </select>
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
                $sqlMeal = "SELECT * FROM meal WHERE mealID = '$mealArray[$x]'";
                $result2 = mysqli_query($conn, $sqlMeal);
                $row2 = $result2->fetch_assoc();

                $price = floatval($row2["price"]); // Convert price to float
                $quantity = intval($quantityArray[$x]); // Convert quantity to integer
            
                $subtotal = $price * $quantity;
                $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $row2["mealName"]; ?></td>
                    <td><?php echo $row2["price"]; ?></td>
                    <td>
                        <button type="button"
                            onclick="updateQuantity(<?php echo $x; ?>, <?php echo $quantity; ?>, 'dec')">-</button>
                        <span id="quantity-<?php echo $x; ?>"><?php echo $quantity; ?></span>
                        <button type="button"
                            onclick="updateQuantity(<?php echo $x; ?>, <?php echo $quantity; ?>, 'inc')">+</button>
                    </td>
                    <td>$<span id="subtotal-<?php echo $x; ?>"><?php echo number_format($subtotal, 2); ?></span></td>
                    <td><button type="button" onclick="removeMeal(<?php echo $x; ?>)">Remove</button></td>
                </tr>
            <?php } ?>
        </table>
        <input type="hidden" name="ordertime" value="<?php echo $formattedDateTime ?>">
        <input type="hidden" name="orderItems" value="<?php echo $row["meals"]; ?>">
        <input type="hidden" name="orderQuantity" value="<?php echo $row["quantity"]; ?>">
        <input type="hidden" name="totalAmount" value="<?php echo number_format($total, 2); ?>">
        <input type="hidden" name="orderUser" value="<?php echo $uid ?>">
        <input type="submit" name="MM_insert" value="Checkout">
    </form>
    <h2>Total Payment: $<span id="total"><?php echo number_format($total, 2); ?></span></h2>
</body>

</html>