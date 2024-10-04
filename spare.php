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
    // $check_stmt = $conn->prepare("SELECT * FROM auth WHERE email = ?");
   // $check_stmt->bind_param("s", $email);
    //$check_stmt->execute();
    //$result = $check_stmt->get_result();
    
    //if ($result->num_rows > 0) {
      //  echo "This email is already registered. Please use a different email.";
    //} else {
        // Insert user into the database
      //  $insert_stmt = $conn->prepare("INSERT INTO auth (username, email, password, role) VALUES (?, ?, ?, ?)");
        
        //if ($insert_stmt === false) {
            die("Error preparing statement: " . $conn->error);
        //}
        
        //$insert_stmt->bind_param("ssss", $username, $email, $password, $role);
        
        //if ($insert_stmt->execute()) {
         //   header("Location: login.php");
           // exit();
        //} else {
          //  echo "Error: " . $insert_stmt->error;
        //}
        
        //$insert_stmt->close();
    //}
    
    //$check_stmt->close();
//}

