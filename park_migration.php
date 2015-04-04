<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'rocks');

require_once 'db_connect.php';

$dbc->exec('DROP TABLE IF EXISTS national_parks');

$query = 'CREATE TABLE national_parks (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        location VARCHAR(100) NOT NULL,
        date_established DATE,
        area_in_acres DOUBLE,
        PRIMARY KEY (id)
    )';

// Run query, if there are errors they will be thrown as PDOExceptions
$dbc->exec($query);