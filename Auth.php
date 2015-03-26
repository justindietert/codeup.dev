<?php 
require_once 'Log.php';

class Auth
{
    public static $hash = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function logUser($access, $username)
    {
        $authLog = new Log('auth');

        if ($access == false && $username == '') {
            return false;
        } else {

            if ($access == true) {
                $authLog->logInfo("User $username logged in.");
            } else {
                $authLog->logInfo("User $username failed to log in.");
            }
        }
    }

    public static function attempt($username, $password) 
    {
        if ($username == 'guest' && password_verify($password, self::$hash)) {
            // set session variable to username;
            $_SESSION['LOGGED_IN_USER'] = $username;

            self::logUser(true, $username);

            return true;

        } else {

            self::logUser(false, $username);

            return false;
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