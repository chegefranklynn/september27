<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="../logout.php" id="logout-btn">Logout</a>
    </nav>
    <h1>Welcome admin</h1>
    <script src="../script.js"></script>
</body>
</html>