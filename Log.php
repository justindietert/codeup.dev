<?php

class Log 
{
    public $handle;

    // Construct the filename and open the file for writing.
    // If no parameter is passed, set the prefix to 'log' by default.
    public function __construct($prefix = 'log') 
    {   
        $date = date('Y-m-d');
        $filename = "$prefix-" . $date . ".log";
        // open the file and write to the end of the file
        // if the file does not already exist, attempt to create it
        $this->handle = fopen($filename, 'a');
    }

    // Log the message to the file
    public function logMessage($logLevel, $message)
    {
        $dateStamp = date("Y/m/d H:i:s");
        $string = "$dateStamp " . "$logLevel " . $message . PHP_EOL;
        fwrite($this->handle, $string);
    }

    public function logInfo($message)
    {
        $this->logMessage("INFO", $message);
    }

    public function logError($message)
    {
        $this->logMessage("ERROR", $message);
    }

    public function __destruct()
    {
        fclose($this->handle);
    }

}