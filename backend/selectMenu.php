<?php
session_start();
require_once ("connection.php");

// This is a sample script to handle different categories
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    $sql = "SELECT * FROM meal WHERE category = '$category'";
    $result = mysqli_query($conn, $sql);

    while ($row = $result->fetch_assoc()) {
        // Output each meal item as per your HTML structure
        ?>
        <div class="box" id="<?php echo $category; ?>">
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
                <a href="../frontend/mealDetail.php?meal=<?php echo $row['mealID']?>" class="btn">Add to cart</a>
                <span class="price">RM <?php echo $row["price"] ?></span>
            </div>
        </div>
        <?php
    }
}
?>