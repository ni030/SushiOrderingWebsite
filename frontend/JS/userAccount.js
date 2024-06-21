const fullUrl=window.location.href;

if(fullUrl.includes("userAccount.php?update=success")){
    alert("Your update is suceessful!")
    window.location.href="../frontend/userAccount.php";
}