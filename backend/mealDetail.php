<?php
    require_once("connection.php");
    $recordID = $_GET["meal"];

    $sql = "SELECT * FROM meal WHERE mealID = '$recordID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            height: 200px;
        }
    </style>
</head>
<body>
    <img src="../frontend/img/<?php echo $row["mealPic"]?>" alt="">
    <?php
        echo "Name: ".$row["mealName"]."\n";
        echo "Description: ".$row["description"]."\n";
        echo "Price: ".$row["price"]."\n";
    ?>
    <form method= "POST" action="addCart.php">
    <p>Quantity:<input type="text" name="quantity" id="quantity"></input></p>
    <input type="hidden" name="mealID" value="<?php echo $row["mealID"]?>">
    <input type="submit" name="MM_update" value="Add to cart">
    </form>
</body>
</html>