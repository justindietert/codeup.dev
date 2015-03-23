<?php
    // start the session (or resume an existing one)
    // this function must be called before trying to set or get any session data!
    session_start();

    // if user already logged in and the user is 'guest', redirect to the authorized page.
    if(isset($_SESSION['LOGGED_IN_USER']) && $_SESSION['LOGGED_IN_USER'] == 'guest') {
        header('Location: /authorized.php');
        exit();
    }

    // set POST['keyValue'] as needed
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // initialize $message as a blank string
    $message = '';

    if ($username != 'guest' && $password != 'password') {

        $message = ($username == '' && $password == '') ? "Please login." : "Login failed. Please try again.";
        // otherwise, display the login failed message.
    } else {
        // set session variable to username;
        $_SESSION['LOGGED_IN_USER'] = $username;
        header('Location: /authorized.php');      
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"><br><br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password"><br><br>

        <input type="submit">
    </form>
    
    <p><?= $message; ?></p>
</body>
</html>