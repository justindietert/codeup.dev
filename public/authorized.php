<?php
    // start the session (or resume an existing one)
    session_start();

    // If the user is not logged in, redirect back to the login page
    if (!isset($_SESSION['LOGGED_IN_USER'])) {
        header('Location: /login.php');      
        exit();
    } else {
        // Set username to the current name of the logged in user
        $username = $_SESSION['LOGGED_IN_USER'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorized</title>
</head>
<body>
    <h3>AUTHORIZED</h3>
    <p><?= $username; ?></p>
    <a href="/logout.php">Logout</a>
</body>
</html>