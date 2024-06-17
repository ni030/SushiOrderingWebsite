document.getElementById('register-form').addEventListener('submit', function(event) {
    const password = document.getElementsByName('password')[0].value; // Get the value of the first element with name 'password'
    const confirmPassword = document.getElementsByName('confirmedPassword')[0].value; // Get the value of the first element with name 'confirmedPassword'
    const errorMessage = document.getElementById('error-message');

    if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        errorMessage.style.display = 'block';
        document.getElementsByName('password')[0].value = ''; // Clear password field
        document.getElementsByName('confirmedPassword')[0].value = ''; // Clear confirm password field
    }
});



