<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'client') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Client Landing Page</title>
</head>
<body>
    <nav>
        <a href="landing.php" class="home">Home</a>
        <a href="logout.php" id="logout-btn">Logout</a>
    </nav>
    <h1>KARIBU CUSTOMER !!</h1> 
    <script src="script.js"></script>
</body>
</html>