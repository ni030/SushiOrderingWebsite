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

//eye toggle
const togglePassword1 = document.getElementById('togglePassword1');
const password = document.getElementsByName('newPW')[0];

// Initial state: password is hidden
togglePassword1.classList.remove('fa-eye');
togglePassword1.classList.add('fa-eye-slash');

// Add click event listener to toggle password visibility
togglePassword1.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Toggle eye icon classes
    if (type === 'password') {
        togglePassword1.classList.add('fa-eye-slash');
        togglePassword1.classList.remove('fa-eye');
    } else {
        togglePassword1.classList.add('fa-eye');
        togglePassword1.classList.remove('fa-eye-slash');
    }
});

const togglePassword2 = document.getElementById('togglePassword2');
const confirmPassword = document.getElementsByName('confirmedPW')[0]; // Get the first element with name 'confirmedPassword'
// Initial state: password is hidden
togglePassword2.classList.remove('fa-eye');
togglePassword2.classList.add('fa-eye-slash');

// Add click event listener to toggle password visibility
togglePassword2.addEventListener('click', function() {
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);

    // Toggle eye icon classes
    if (type === 'password') {
        togglePassword2.classList.add('fa-eye-slash');
        togglePassword2.classList.remove('fa-eye');
    } else {
        togglePassword2.classList.add('fa-eye');
        togglePassword2.classList.remove('fa-eye-slash');
    }
});

const togglePassword3 = document.getElementById('togglePassword3');
const curPassword = document.getElementsByName('currentPW')[0]; // Get the first element with name 'confirmedPassword'
// Initial state: password is hidden
togglePassword3.classList.remove('fa-eye');
togglePassword3.classList.add('fa-eye-slash');

// Add click event listener to toggle password visibility
togglePassword3.addEventListener('click', function() {
    const type = curPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    curPassword.setAttribute('type', type);

    // Toggle eye icon classes
    if (type === 'password') {
        togglePassword3.classList.add('fa-eye-slash');
        togglePassword3.classList.remove('fa-eye');
    } else {
        togglePassword3.classList.add('fa-eye');
        togglePassword3.classList.remove('fa-eye-slash');
    }
});

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

curPassword.addEventListener('keyup',()=>{
    document.getElementById('current_error').style.display = 'none';
    curPassword.classList.remove('input-error');
});

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