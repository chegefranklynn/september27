document.addEventListener('DOMContentLoaded', function() {
    var loginForm = document.getElementById('login-form');
    var registerForm = document.getElementById('register-form');

    // Show the appropriate form based on which page we're on
    // This ensures the correct form is visible when the page loads
    if (loginForm) loginForm.style.display = 'block';
    if (registerForm) registerForm.style.display = 'block';

    // Handle the "Forgot Password" link on the login page
    var forgotPassword = document.getElementById('forgot-password');
    if (forgotPassword) {
        forgotPassword.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            alert('Password reset functionality not implemented yet.');
        });
    }

    // Handle the "Already have an account? Login" link on the register page
    var showLogin = document.getElementById('show-login');
    if (showLogin) {
        showLogin.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            window.location.href = 'login.php'; // Redirect to the login page
        });
    }

    // Handle the "Don't have an account? Register" link on the login page
    var showRegister = document.getElementById('show-register');
    if (showRegister) {
        showRegister.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            window.location.href = 'register.php'; // Redirect to the register page
        });
    }

    // Handle logout
  
});