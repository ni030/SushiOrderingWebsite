const currentPage = window.location.pathname;
console.log("called main");

// Ensure proper element selection and typo corrections
if (currentPage.includes("frontend/index.php")) {
    document.querySelectorAll('.home-link').forEach(link => link.classList.add('active'));
} else if (currentPage.includes("frontend/menuPage.php")) {
    document.querySelectorAll('.menu-link').forEach(link => link.classList.add('active'));
} else if (currentPage.includes("frontend/promotion.php")) {
    document.querySelectorAll('.promo-link').forEach(link => link.classList.add('active'));
} else if (currentPage.includes("backend/viewCart.php")) {
    document.querySelectorAll('.cart-link').forEach(link => link.classList.add('active'));
}

function showSideBar() {
    console.log("called show");
    document.getElementById('sideBar').style.display = 'flex';
}

function hideSideBar() {
    console.log("called hide");
    document.getElementById('sideBar').style.display = 'none';
}