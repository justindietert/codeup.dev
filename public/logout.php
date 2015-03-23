<?php
// start the session (or resume an existing one)
session_start();

// code for this function came directly from PHP docs:
// http://php.net/session_destroy
function endSession()
{
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

// call the function to end the current session
endSession();

// Redirect to the login page
header('Location: /login.php');      
exit();