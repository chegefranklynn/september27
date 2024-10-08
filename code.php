<?php
session_start();
require 'database.php'; // Include your database connection

// Login logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password']) && !isset($_POST['username'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM auth WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            
            if ($user['role'] == "admin") {
                header("Location: ADMIN/dashboard.php");
            } else {
                header("Location: landing.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "No user found with that email.";
    }
    
    header("Location: login.php");
    exit();
}

// Registration logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
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
        $_SESSION['error'] = "This email is already registered. Please use a different email.";
    } else {
        // Insert user into the database
        $insert_stmt = $conn->prepare("INSERT INTO auth (username, email, password, role) VALUES (?, ?, ?, ?)");
        
        if ($insert_stmt === false) {
            $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        } else {
            $insert_stmt->bind_param("ssss", $username, $email, $password, $role);
            
            if ($insert_stmt->execute()) {
                $_SESSION['success'] = "Registration successful. Please log in.";
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['error'] = "Error: " . $insert_stmt->error;
            }
            
            $insert_stmt->close();
        }
    }
    
    $check_stmt->close();
    header("Location: register.php");
    exit();
}

// Logout function
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}


