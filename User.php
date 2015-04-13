<?php

require_once 'Model.php';

class User extends Model 
{
    protected static $table = 'users';
}

//------ TEST ------//

echo User::getTableName() . PHP_EOL;