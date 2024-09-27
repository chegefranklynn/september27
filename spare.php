<?php
//session_start();
//require 'database.php'; // Include your database connection

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 //   $username = $_POST['username'];
   // $email = $_POST['email'];
    //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Insert user into the database
   // $stmt = $conn->prepare("INSERT INTO users (username, email, password, role, is_verified) VALUES (?, ?, ?, 'client', 0)");
    
    // Check if the statement was prepared successfully
   // if ($stmt === false) {
       // die("Error preparing statement: " . $conn->error);
    //}
    
   // $stmt->bind_param("sss", $username, $email, $password);
    
   // if ($stmt->execute()) {
        // Send verification email
       // $verification_code = md5($email.time());
       // $stmt = $conn->prepare("UPDATE users SET verification_code=? WHERE email=?");
        
        // Check if the statement was prepared successfully
        ///if ($stmt === false) {
           // die("Error preparing statement: " . $conn->error);
       // }
        
        //$stmt->bind_param("ss", $verification_code, $email);
        //$stmt->execute();
        
        // Send email logic here (use mail() function or PHPMailer)
        
        //echo "Registration successful! Please check your email to verify your account.";
   // } else {
        //echo "Error: " . $stmt->error;
    //}
//}
?>
