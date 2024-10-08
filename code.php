<?php
session_start();
require 'database.php'; // Include your database connection

// Login logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password']) && !isset($_POST['username'])) {
    // This block handles user login
    // It checks if the form submitted is for login (no username field)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute a query to find the user by email
    $stmt = $conn->prepare("SELECT * FROM auth WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // If a user is found, verify the password
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // If password is correct, set session variables and redirect
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on user role
            if ($user['role'] == "admin") {
                header("Location: ADMIN/dashboard.php");
            } else {
                header("Location: landing.php");
            }
            exit();
        } else {
            // If password is incorrect, set an error message
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        // If no user is found with the given email, set an error message
        $_SESSION['error'] = "No user found with that email.";
    }
    
    // Redirect back to login page if login fails
    header("Location: login.php");
    exit();
}

// Registration logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    // This block handles user registration
    // It checks if the form submitted is for registration (username field is present)
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = isset($_POST['role']) ? $_POST['role'] : 'client';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    
    // Check if email already exists in the database
    $check_stmt = $conn->prepare("SELECT * FROM auth WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        // If email already exists, set an error message
        $_SESSION['error'] = "This email is already registered. Please use a different email.";
    } else {
        // If email is unique, insert the new user into the database
        $insert_stmt = $conn->prepare("INSERT INTO auth (username, email, password, role) VALUES (?, ?, ?, ?)");
        
        if ($insert_stmt === false) {
            // If there's an error preparing the statement, set an error message
            $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        } else {
            $insert_stmt->bind_param("ssss", $username, $email, $password, $role);
            
            if ($insert_stmt->execute()) {
                // If registration is successful, set a success message and redirect to login page
                $_SESSION['success'] = "Registration successful. Please log in.";
                header("Location: login.php");
                exit();
            } else {
                // If there's an error during insertion, set an error message
                $_SESSION['error'] = "Error: " . $insert_stmt->error;
            }
            
            $insert_stmt->close();
        }
    }
    
    $check_stmt->close();
    // Redirect back to registration page if registration fails
    header("Location: register.php");
    exit();
}

// Logout function
if (isset($_GET['logout'])) {
    // This block handles user logout
    // It destroys the session and redirects to the login page
    session_destroy();
    header("Location: login.php");
    exit;
}


