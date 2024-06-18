const fullUrl=window.location.href;

if(fullUrl.includes("login.php?signup=success")){
    alert("Your registration is suceessful!")
    window.location.href="../frontend/login.php";
}
if(fullUrl.includes("login.php?signup=email")){
    document.getElementById('email_error').style.display='block';
}
else{
    document.getElementById('email_error').style.display='none';
}
if(fullUrl.includes("login.php?signup=pass")){
    document.getElementById('pass_error').style.display='block';
}
else{
    document.getElementById('pass_error').style.display='none';
}


