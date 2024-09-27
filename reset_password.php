<?php
session_start();
require 'database.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $reset_code = md5($email.time());
        $stmt = $conn->prepare("UPDATE users SET reset_code=? WHERE email=?");
        $stmt->bind_param("ss", $reset_code, $email);
        $stmt->execute();
        
        // Send reset email logic here (use mail() function or PHPMailer)
        
        echo "Reset link sent to your email.";
    } else {
        echo "No user found with that email.";
    }
}
?>
