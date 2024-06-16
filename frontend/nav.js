const currentPage = window.location.pathname;
console.log(currentPage);

if(currentPage === "/SushiOrderingWebsite-main/frontend/index.php"){
    document.getElementById('home-link').classList.add('active');
}
if(currentPage === "/SushiOrderingWebsite-main/frontend/menuPage.html"){
    document.getElementById('menu-link').classList.add('active');
}
if(currentPage === "/SushiOrderingWebsite-main/frontend/promotion.html"){
    document.getElementById('promo-link').classList.add('active');
}


