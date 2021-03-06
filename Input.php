<?php

class Input
{
    /***********************************************************************************
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]) ? true : false;
    }

    /***********************************************************************************
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


    /***********************************************************************************
     * Strip any tags from user input and convert special characters to HTML entities
     */
    public static function escape($input) 
    {
        return htmlentities(strip_tags($input));
    }

    /***********************************************************************************
     * Get String
     */
    public static function getString($key, $min = null, $max = null) 
    {
        $string = trim(self::get($key));

        if (empty($string)) {

            throw new OutOfRangeException('Input cannot be empty.');
        }

        if(!is_string($string)) {

            throw new InvalidArgumentException('Input must be a string.'); 
        } 

        if(!is_int($min) && !is_null($min)) {

            throw new InvalidArgumentException('$min must be a number.');
        }

        if(!is_int($max) && !is_null($max)) {

            throw new InvalidArgumentException('$max must be a number.');
        }

        return $string;
    }

    /***********************************************************************************
     * Get Number
     */
    public static function getNumber($key, $min = null, $max = null)
    {
        $number = trim(self::get($key));

        if (empty($number)) {

            throw new OutOfRangeException('Input cannot be empty.');
        }

        if(!is_numeric($number)) {

            throw new InvalidArgumentException('Input must be a number.');
        }

        return floatval($number);
    }

    /***********************************************************************************
     * Check for Zero
     */
    public static function notZero($key)
    {
        if ($key == 0) {

            throw new Exception('Input cannot be zero.');
        }

        return $key;
    }

    /***********************************************************************************
     * Get Date
     */
    public static function getDate($key, $min = null, $max = null)
    {
        $userDate = trim(self::get($key));

        if (empty($userDate)) {

            throw new OutOfRangeException('Input cannot be empty.');
        }

        if(self::validateDate($userDate, 'Y-m-d') == false) {
            throw new InvalidArgumentException('Invalid date. Please format as: YYYY-MM-DD.');
        }

        return $userDate;
    }

    /***********************************************************************************
     * Validate Date
     */
    public static function validateDate($date, $format = 'Y-m-d')
    {   
        // Set $d to instance of DateTime class created from format and date passed in
        $d = DateTime::createFromFormat($format, $date);

        // returns true if $d is formatted correctly as inputted (it equals what was input by user)
        // format() returns false if $d is not able to be formatted into a usable date, resulting in false overall
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