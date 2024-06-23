const curPage = window.location.href;

document.getElementById('email_error').style.display = 'none';
document.getElementById('phone_error').style.display = 'none';
document.getElementById('matched_error').style.display = 'none';
document.getElementById('password_error').style.display = 'none';

if (curPage.includes("register.php?signup=email")) {
    document.getElementById('email_error').style.display = 'block';
    document.getElementById('inputEmail4').classList.add('input-error');
}

if (curPage.includes("register.php?signup=phone")) {
    document.getElementById('phone_error').style.display = 'block';
    document.getElementsByName('mobileNum')[0].classList.add('input-error');
}
if (curPage.includes("register.php?signup=both")) {
    document.getElementById('phone_error').style.display = 'block';
    document.getElementsByName('mobileNum')[0].classList.add('input-error');
    document.getElementById('email_error').style.display = 'block';
    document.getElementById('inputEmail4').classList.add('input-error');
}

// Get references to DOM elements
const togglePassword1 = document.getElementById('togglePassword1');
const password = document.getElementsByName('password')[0]; // Get the first element with name 'password'

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
const confirmPassword = document.getElementsByName('confirmedPassword')[0]; // Get the first element with name 'confirmedPassword'

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

const mobile=document.getElementsByName('mobileNum')[0];
const email=document.getElementById('inputEmail4');

let pass = 0;
let match = 0;
let mob=0;
var correct=pass+match+mob;

function updateCorrect() {
    correct = pass + match+mob;
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

email.addEventListener('keyup',()=>{
    document.getElementById('email_error').style.display = 'none';
    email.classList.remove('input-error');
});

mobile.addEventListener('keyup',()=>{
    console.log("mobile");
    var isNumeric = /^\d+$/.test(mobile.value);
    if ((!isNumeric) || mobile.value.length<10) {
        // Show the error message
        document.getElementById('phone_error').style.display = 'block';
        document.getElementById('phone_error').textContent = '* Please enter a valid mobile number.';
        
        // Add a class to the input to highlight the error
        mobile.classList.add('input-error');
        mob=0;
    } else {
        // Hide the error message if the input is valid
        document.getElementById('phone_error').style.display = 'none';
        document.getElementById('phone_error').textContent = '';
        
        // Remove the error highlight from the input
        mobile.classList.remove('input-error');
        mob=1;
    }
    updateCorrect()
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

document.getElementById('register-form').addEventListener('submit', function(event) {
    if (correct !== 3) {
        event.preventDefault();
    }
});
