   <?php 
   session_start();
  include 'includes/header.php';

   ?>
   <div class="container">
        <div id="login-form" class="form">
            <h2>Login</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
                unset($_SESSION['success']);
            }
            ?>
            <form id="login" method="POST" action="code.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <p><a href="register.php" id="show-register">Don't have an account? Register</a></p>
                <p><a href="#" id="forgot-password">Forgot Password?</a></p>
            </form> 
        </div>
    </div>
    <script src="script.js"></script>