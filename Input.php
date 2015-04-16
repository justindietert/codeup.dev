<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]) ? true : false;
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key) ? $_REQUEST[$key] : $default;
    }

    /* Strip any tags from user input and convert special characters to HTML entities */
    public static function escape($input) 
    {
        return htmlentities(strip_tags($input));
    }

    public static function getString($key) 
    {
        $string = trim(self::get($key));

        if(!is_string($string) || empty($string)) {

            throw new Exception('Input must be a string.'); 
        } 

        return $string;
    }

    public static function getNumber($key)
    {
        $number = trim(self::get($key));

        if(!is_numeric($number)) {

            throw new Exception('Input must be a number.');
        }

        return floatval($number);
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}