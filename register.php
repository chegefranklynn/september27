<?php
session_start();
require 'database.php'; // Include your database connection
//How to give written access in github
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = isset($_POST['role']) ? $_POST['role'] : 'client';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT * FROM auth WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "This email is already registered. Please use a different email.";
        //header("location:reset_password");
        exit();
    } else {
        // Insert user into the database
        $insert_stmt = $conn->prepare("INSERT INTO auth (username, email, password, role) VALUES (?, ?, ?, ?)");
        
        if ($insert_stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        
        $insert_stmt->bind_param("ssss", $username, $email, $password, $role);
        
        if ($insert_stmt->execute()) {
            header("Location: index.html");
            exit();
        } else {
            echo "Error: " . $insert_stmt->error;
        }
        
        $insert_stmt->close();
    }
    
    $check_stmt->close();
}
// ... existing code ...