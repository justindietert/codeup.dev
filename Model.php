<?php

class Model 
{
    // array to store key/value data
    private $attributes = [];
    protected static $table;

    // magic setter to populate $attributes array
    public function __set($name, $value)
    {
        // set the $name key to hold $value in $attributes
        $this->attributes[$name] = $value;
    }

    // Magic getter to retrieve values from $attributes
    public function __get($name)
    {
        // Check for existence of array key $name in $attributes array
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }
}


//------ TEST ------//

$thing = new Model;

$thing->fruit = 'orange';

echo $thing->fruit . PHP_EOL;
var_dump($thing->stuff);