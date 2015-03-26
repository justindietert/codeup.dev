<?php
    require_once 'functions.php';
    require_once '../Auth.php';
    require_once '../Input.php';
    // start the session (or resume an existing one)
    // this function must be called before trying to set or get any session data!
    session_start();

    // if user already logged in and the user is 'guest', redirect to the authorized page.
    if(Auth::check() && Auth::user() == 'guest') {
        header('Location: /authorized.php');
        exit();
    }
    // set POST['keyValue'] as needed
    $username = Input::has('username') ? Input::escape(Input::get('username')) : '';
    $password = Input::has('password') ? Input::escape(Input::get('password')) : '';
    // initialize $message as a blank string
    $message = '';
    // Check for correct user input
    if (Auth::attempt($username, $password)) {
        header('Location: /authorized.php');      
        exit();
        // otherwise, display the login failed message.
    } else {
        $message = ($username == '' && $password == '') ? "Please login." : "Login failed. Please try again.";
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