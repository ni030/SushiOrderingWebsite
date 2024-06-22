const url = window.location.pathname;
console.log(window.location.pathname);

if(url.includes("frontend/userAccount.php")){
    console.log("called");
    document.getElementById('profile-link').classList.add('active');
}
else if(url.includes("frontend/address.php")){
    document.getElementById('address-link').classList.add('active');
}
else if(url.includes("frontend/orderHistory.php")){
    document.getElementById('order-link').classList.add('active');
}
else if(url.includes("frontend/changePass.php")){
    document.getElementById('pass-link').classList.add('active');
}
