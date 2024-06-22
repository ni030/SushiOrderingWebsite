const curPage = window.location.href;

document.getElementById('current_error').style.display='none';
document.getElementById('tech_error').style.display='none';
document.getElementById('matched_error').style.display='none';
document.getElementById('password_error').style.display = 'none';

if(curPage.includes("changePass.php?change=success")){
    alert("Your password is changed suceessfully!")
    window.location.href="../frontend/userAccount.php";
}
if(curPage.includes("changePass.php?change=current")){
    document.getElementById('current_error').style.display='block';
    document.getElementsByName('currentPW')[0].classList.add('input-error');
}
if(curPage.includes("changePass.php?change=error")){
    document.getElementById('tech_error').style.display='block';
}

const password = document.getElementsByName('newPW')[0]; // Get the first element with name 'password'
const confirmPassword = document.getElementsByName('confirmedPW')[0]; // Get the first element with name 'confirmedPassword'
let pass = 0;
let match = 0;
var correct=pass+match;

function updateCorrect() {
    correct = pass + match;
}

function validate(){
    const userConfirm = confirmPassword.value;
    if (userConfirm !== password.value) {
        document.getElementById('matched_error').style.display = 'block';
        password.classList.add('input-error');
        confirmPassword.classList.add('input-error');
        match = 0;
    } else {
        document.getElementById('matched_error').style.display = 'none';
        password.classList.remove('input-error');
        confirmPassword.classList.remove('input-error');
        match = 1;
    }
    updateCorrect()
}

password.addEventListener('keyup', () => {
    console.log("Function is called");
    const userPassword = password.value;
    const lowerCaseLetters = /[a-z]/g;
    const upperCaseLetters = /[A-Z]/g;
    const numbers = /[0-9]/g;
    if (!(userPassword.length >= 8 && userPassword.match(lowerCaseLetters) && userPassword.match(upperCaseLetters) && userPassword.match(numbers))) {
        document.getElementById('password_error').style.display = 'block';
        password.classList.add('input-error');
        confirmPassword.disabled=true;
        pass = 0;
    } else {
        document.getElementById('password_error').style.display = 'none';
        password.classList.remove('input-error');
        confirmPassword.disabled=false;
        pass = 1;
        validate();
    }
    updateCorrect()
});

confirmPassword.addEventListener('keyup', () => {
    validate();
});

document.getElementById('change-form').addEventListener('submit', function(event) {
    if (correct !== 2) {
        event.preventDefault();
    }
});