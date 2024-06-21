const fullUrl=window.location.href;

document.getElementById('email_error').style.display='none';
document.getElementById('pass_error').style.display='none';

if(fullUrl.includes("login.php?signup=success")){
    alert("Your registration is suceessful!");
    window.location.href="../frontend/login.php";
}

if(fullUrl.includes("login.php?login=success")){
    alert("Your login is suceessful!");
    window.location.href="../frontend/index.php";
}

if(fullUrl.includes("login.php?signup=email")){
    document.getElementById('email_error').style.display='block';
    document.getElementById('inputEmail4').classList.add('input-error');
}

if(fullUrl.includes("login.php?signup=pass")){
    document.getElementById('pass_error').style.display='block';
    document.getElementsByName('password')[0].classList.add('input-error');
}


