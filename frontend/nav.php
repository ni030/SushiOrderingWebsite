<nav class="navbar">
    <div class="navbar-left">
        <div class="navbar-brand">
            <a href="index.php" class="navbar-logo">
                <img src="img/logo.PNG" alt="Logo">
            </a>
            <span class="shop-name">Sushi Bliss</span>
        </div>
        <ul class="navbar-menu">
            <li><a href="index.php" id="home-link">Home</a></li>
            <li><a href="menuPage.php" id="menu-link">Menu</a></li>
            <li><a href="promotion.php" id="promo-link">Promotion</a></li>
        </ul>
    </div>
    <div class="navbar-profile">
        <a href="userAccount.php">
            <div>
                <?php
                if ($_SESSION["loggedin"] === TRUE) {
                    echo "Hi, " . $_SESSION["name"];
                } else {
                    echo "Login";
                }
                ?>
            </div>
        </a>
    </div>
</nav>