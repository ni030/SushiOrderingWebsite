const curPage = window.location.href;

if(curPage.includes("changePass.php?change=success")){
    document.getElementById('tech_error').style.display='block';
    alert("Your password is changed suceessfully!")
    window.location.href="../frontend/userAccount.php";
}
if(curPage.includes("changePass.php?change=current")){
    document.getElementById('current_error').style.display='block';
}
else{
    document.getElementById('current_error').style.display='none';
}
if(curPage.includes("changePass.php?change=error")){
    document.getElementById('tech_error').style.display='block';
}
else{
    document.getElementById('tech_error').style.display='none';
}

document.getElementById('change-form').addEventListener('submit', function(event) {
    const password = document.getElementsByName('newPW')[0].value; // Get the value of the first element with name 'password'
    const confirmPassword = document.getElementsByName('confirmedPW')[0].value; // Get the value of the first element with name 'confirmedPassword'
    var lowerCaseLetters=/[a-z]/g;
    var upperCaseLetters=/[A-Z]/g;
    var numbers=/[0-9]/g;
    console.log("parent is called");

    if(!(password.length>=8 && password.match(lowerCaseLetters)&&password.match(upperCaseLetters)&&password.match(numbers))){
        console.log("enter if condition");
        event.preventDefault(); // Prevent form submission
        document.getElementById('password_error').style.display = 'block';
        document.getElementById('current_error').style.display='none';
        document.getElementById('tech_error').style.display='none';
        document.getElementById('matched_error').style.display='none';
        document.getElementsByName('newPW')[0].value = ''; // Clear password field
        document.getElementsByName('confirmedPW')[0].value = ''; // Clear confirm password field
        return;
    }

    if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('matched_error').style.display = 'block';
        document.getElementById('password_error').style.display = 'none';
        document.getElementById('current_error').style.display='none';
        document.getElementById('tech_error').style.display='none';
        document.getElementsByName('newPW')[0].value = ''; // Clear password field
        document.getElementsByName('confirmedPW')[0].value = ''; // Clear confirm password field
    }
});
