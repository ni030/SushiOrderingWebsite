const currentPage = window.location.pathname;

if(currentPage.includes("frontend/index.php")){
    document.getElementById('home-link').classList.add('active');
}
else if(currentPage.includes("frontend/menuPage.php")){
    document.getElementById('menu-link').classList.add('active');
}
else if(currentPage.includes("frontend/promotion.html")){
    document.getElementById('promo-link').classList.add('active');
}
else if(currentPage==="/SushiOrderingWebsite-main/frontend/"){
    document.getElementById('home-link').classList.add('active');
}

