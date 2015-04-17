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

    // Get string
    public static function getString($key, $min = null, $max = null) 
    {
        $string = trim(self::get($key));

        if(!is_string($string) || empty($string)) {

            throw new InvalidArgumentException('Input must be a string.'); 
        } 

        if(!is_numeric($min)) {

            throw new InvalidArgumentException('$min must be a number.');
        }

        if(!is_numeric($max)) {

            throw new InvalidArgumentException('$max must be a number.');
        }

        return $string;
    }

    // Get number
    public static function getNumber($key, $min = null, $max = null)
    {
        $number = trim(self::get($key));

        if(!is_numeric($number)) {

            throw new Exception('Input must be a number.');
        }

        return floatval($number);
    }

    // Check if zero
    public static function notZero($key)
    {
        if ($key == 0) {

            throw new Exception('Input cannot be zero.');
        }

        return $key;
    }

    // Get date
    public static function getDate($key, $min = null, $max = null)
    {
        $userDate = trim(self::get($key));

        if(self::validateDate($userDate, 'Y-m-d') == false) {
            throw new Exception('Invalid date. Please format as: YYYY-MM-DD.');
        }

        return $userDate;
    }

    // Validate date
    public static function validateDate($date, $format = 'Y-m-d')
    {   
        // Set $d to instance of DateTime class created from format and date passed in
        $d = DateTime::createFromFormat($format, $date);

        // returns true if $d is formatted correctly as inputted (it equals what was input by user)
        // returns false if it is not able to be formatted into a usable date
        return $d && $d->format($format) == $date;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}