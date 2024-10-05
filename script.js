document.getElementById('show-register').addEventListener('click', function() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
});

document.getElementById('show-login').addEventListener('click', function() {
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
});

document.getElementById('forgot-password').addEventListener('click', function() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('reset-password-form').style.display = 'block';
});

document.getElementById('show-login-reset').addEventListener('click', function() {
    document.getElementById('reset-password-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
});

document.getElementById('logout-btn').addEventListener('click', function()
 { window.location.href = 'login.php?logout=true'; });