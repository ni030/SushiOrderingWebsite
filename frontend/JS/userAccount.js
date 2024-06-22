const fullUrl = window.location.href;

if (fullUrl.includes("userAccount.php?update=success")) {
    alert("Your update is suceessful!")
    window.location.href = "../frontend/userAccount.php";
}
if (fullUrl.includes("userAccount.php?add=success")) {
    alert("Your address is added suceessfully!")
    window.location.href = "../frontend/userAccount.php";
}
if (fullUrl.includes("userAccount.php?edit=success")) {
    alert("Your address is edited suceessfully!")
    window.location.href = "../frontend/userAccount.php";
}
if (fullUrl.includes("userAccount.php?remove=success")) {
    alert("Your address is removed suceessfully!")
    window.location.href = "../frontend/userAccount.php";
}