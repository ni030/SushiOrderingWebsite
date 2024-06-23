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

const email=document.getElementById('inputEmail4');
email.addEventListener('keyup',()=>{
    document.getElementById('email_error').style.display = 'none';
    email.classList.remove('input-error');
});

password.addEventListener('keyup',()=>{
    document.getElementById('pass_error').style.display = 'none';
    password.classList.remove('input-error');
});



