const curPage = window.location.href;

if(curPage.includes("register.php?signup=email")){
    document.getElementById('email_error').style.display='block';
}
else{
    document.getElementById('email_error').style.display='none';
}
if(curPage.includes("register.php?signup=phone")){
    document.getElementById('phone_error').style.display='block';
}
else{
    document.getElementById('phone_error').style.display='none';
}

document.getElementById('register-form').addEventListener('submit', function(event) {
    const password = document.getElementsByName('password')[0].value; // Get the value of the first element with name 'password'
    const confirmPassword = document.getElementsByName('confirmedPassword')[0].value; // Get the value of the first element with name 'confirmedPassword'
    var lowerCaseLetters=/[a-z]/g;
    var upperCaseLetters=/[A-Z]/g;
    var numbers=/[0-9]/g;
    console.log("parent is called");

    if(!(password.length>=8 && password.match(lowerCaseLetters)&&password.match(upperCaseLetters)&&password.match(numbers))){
        console.log("enter if condition");
        event.preventDefault(); // Prevent form submission
        document.getElementById('password_error').style.display = 'block';
        document.getElementById('matched_error').style.display = 'none';
        document.getElementById('email_error').style.display='none';
        document.getElementById('phone_error').style.display='none';
        document.getElementsByName('password')[0].value = ''; // Clear password field
        document.getElementsByName('confirmedPassword')[0].value = ''; // Clear confirm password field
        return;
    }

    if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('matched_error').style.display = 'block';
        document.getElementById('password_error').style.display = 'none';
        document.getElementById('email_error').style.display='none';
        document.getElementById('phone_error').style.display='none';
        document.getElementsByName('password')[0].value = ''; // Clear password field
        document.getElementsByName('confirmedPassword')[0].value = ''; // Clear confirm password field
    }
});


