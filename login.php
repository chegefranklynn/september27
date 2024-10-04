<?php
session_start();
require 'database.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM auth WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    
    if ($result->num_rows > 0) {
        $role = $result->fetch_assoc();

      //  echo "Stored hash: " . $user['password'] . "<br>";
      //  echo "Entered password (plain): " . $password . "<br>";
        
        if (password_verify($password, $role['password'])) {
            if ($role['role'] == "admin") {
                $_SESSION['user_id'] = $role['id'];
                $_SESSION['role'] = $role['role'];
                header("Location:dashboard.php");
                exit();
            } else {
                if ($role['role'] == "client") {
                    $_SESSION['user_id'] = $role['id'];
                    $_SESSION['role'] = $role['role'];
                    header("Location:landing.php");
                    exit();
                }
               // echo "Please verify your email before logging in.";
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>
