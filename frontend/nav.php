<div class="navbar">
    <div class="navbar-left">
        <div class="navbar-brand">
            <a href="../frontend/index.php" class="navbar-logo">
                <img src="../frontend/img/logo.PNG" alt="Logo">
            </a>
            <span class="shop-name">Sushi Bliss</span>
        </div>
        <ul id="sideBar">
            <li onclick=hideSideBar()><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                    width="24px" fill="black">
                    <path
                        d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg></li>
            <li><a href="../frontend/index.php" class="home-link">Home</a></li>
            <li><a href="../frontend/menuPage.php" class="menu-link">Menu</a></li>
            <li><a href="../frontend/promotion.php" clas="promo-link">Promotion</a></li>
            <li><a href="../backend/viewCart.php" class="cart-link">Cart</a></li>
            <?php
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) { ?>
            <li><a href="../frontend/login.php">Login</a></li>
            <?php } else { ?>
            <li><a href="../frontend/userAccount.php">Profile Page</a></li>
            <?php } ?>
        </ul>
        <ul class="navbar-menu">
            <li><a href="../frontend/index.php" class="home-link">Home</a></li>
            <li><a href="../frontend/menuPage.php" class="menu-link">Menu</a></li>
            <li><a href="../frontend/promotion.php" class="promo-link">Promotion</a></li>
        </ul>
    </div>
    <div id="sideBaricon" onclick=showSideBar()>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f4e7d4">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </svg>
    </div>
    <div class="navbar-profile">
        <span>
            <?php
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
                echo "<a href=\"login.php\">Login</a>";
            } else {
                echo "<a href=\"userAccount.php\">Hi, " . $_SESSION["name"] . "</a>";
            }
            ?>
        </span>

        <div class="navCart">
            <a href="viewCart.php" class="cart-link">
                <i style="margin-right: 1%;" class="fa-solid fa-cart-shopping justify-content-end fa-xl"></i>
            </a>
        </div>
    </div>
</div>