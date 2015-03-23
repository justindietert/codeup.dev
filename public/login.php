<?php
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $message = '';

    if ($username == 'guest' && $password == 'password') {
        header('Location: authorized.php');
        exit();
    } else {
        $message = 'Login failed.';
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
        <label for="username">Username: </label>
        <input type="text" name="username"><br>

        <label for="password">Password: </label>
        <input type="password" name="password"><br>

        <input type="submit">
    </form>
    
    <? if ($_POST && strlen($message) > 1): ?>
        <p><?= $message; ?></p>
    <? endif; ?>

</body>
</html>