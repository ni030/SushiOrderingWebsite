document.addEventListener('DOMContentLoaded', function() {
    const loginLink = document.getElementById('login-link');
    const profileName = document.getElementById('profile-name');

    function checkLoginStatus() {
        // Simulating a check for login status (replace with actual check)
        const userLoggedIn = localStorage.getItem('userLoggedIn');
        const storedProfileName = localStorage.getItem('profileName');
    
        if (userLoggedIn === 'true' && storedProfileName) {
            profileName.style.display = 'block';
            profileName.textContent = storedProfileName;
            profileName.href = 'userAccount.php'; // Link to the user profile page
            loginLink.textContent = ''; // Remove "Login" text
            loginLink.style.display = 'none'; // Hide the "Login" link
        } else {
            profileName.style.display = 'none';
            loginLink.textContent = 'Login'; // Display "Login" text
            loginLink.href = 'login.php'; // Link to the login page
            loginLink.style.display = 'block'; // Show the "Login" link
        }
    }    

    // Run check on page load
    checkLoginStatus();

    // Function to set active link based on URL
    function setActiveLink() {
        const currentPage = window.location.pathname.split('/').pop();

        const links = {
            'index.php': document.getElementById('home-link'),
            'menu.html': document.getElementById('menu-link'),
            'promotion.html': document.getElementById('promotion-link')
        };

        if (links[currentPage]) {
            links[currentPage].classList.add('active');
        }
    }

    // Run setActiveLink on page load
    setActiveLink();
});

