<?php 
require_once 'Log.php';

class Auth
{
    public static $users = [
        'guest' => '$2y$10$RQsCYHpDXINqFkjWabinD.8gDgHFssg3mFxE2iEnfA295YIeFCLEO',
        'justin' => '$2y$10$UNSNJD43kQBtkSTF.Upj9.d2uxqRm6OOiv0MVKDUPu5F7AnMlDExC',
        'kenny' => '$2y$10$dPwUglqJ3UoeP1riRdnLXetMm1yBCeCPFDNG.NiKX3yJQf3oYO9xS'
    ];

    public static function logUser($access, $username)
    {
        // create a new log with the prefix 'auth'
        $authLog = new Log('auth');
        // if login was successful, log this message:
        if ($access == true) {
            $authLog->logInfo("User $username logged in.");
        // otherwise, log this message:
        } else {
            $authLog->logInfo("User $username failed to log in.");
        }
    }

    public static function attempt($username, $password) 
    {
        // if username is not an empty string and the entered username exists in $users array
        if(!empty($username) && isset(self::$users[$username])) {
            // if the user's password matches the hash associated with their username
            if (password_verify($password, self::$users[$username])) {
                // set session variable to username
                $_SESSION['LOGGED_IN_USER'] = $username;
                // log a message that the user logged in successfully
                self::logUser(true, $username);
                // return true (needed for redirect to authorized.php from login.php)
                return true;
            // otherwise
            } else {
                // log a message that the user failed to log in successfully
                self::logUser(false, $username);
                // return false so the appropriate message can be displayed in login.php
                return false;
            }
        }
    }

    public static function check()
    {
        return isset($_SESSION['LOGGED_IN_USER']);
    }

    public static function user()
    {
        return $_SESSION['LOGGED_IN_USER'];
    }

    public static function logout()
    {
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
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Auth class should not ever be instantiated, so we prevent the     //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}