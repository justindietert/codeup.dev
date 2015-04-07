<?php

require_once 'park_logins.php';
require_once 'db_connect.php';

$clearTable = 'TRUNCATE TABLE national_parks';
$dbc->exec($clearTable);

$parks = [
    ['name' => 'Acadia',                       'location' => 'Maine',          'date' => '1919-02-26', 'area' => '47389.67'],
    ['name' => 'American Samoa',               'location' => 'American Samoa', 'date' => '1988-10-31', 'area' => '9000.00'],
    ['name' => 'Arches',                       'location' => 'Utah',           'date' => '1929-04-12', 'area' => '76518.98'],
    ['name' => 'Badlands',                     'location' => 'South Dakota',   'date' => '1978-11-10', 'area' => '242755.94'],
    ['name' => 'Big Bend',                     'location' => 'Texas',          'date' => '1944-06-12', 'area' => '801163.21'],
    ['name' => 'Biscayne',                     'location' => 'Florida',        'date' => '1980-06-28', 'area' => '172924.07'],
    ['name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado',       'date' => '1999-11-10', 'area' => '32950.03'],
    ['name' => 'Bryce Canyon',                 'location' => 'Utah',           'date' => '1928-02-25', 'area' => '1311875'],
    ['name' => 'Canyonlands',                  'location' => 'Utah',           'date' => '1964-09-12', 'area' => '462242'],
    ['name' => 'Capitol Reef',                 'location' => 'Utah',           'date' => '1971-12-18', 'area' => '241904.26']
];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) 
              VALUES ('{$park['name']}', '{$park['location']}', '{$park['date']}', '{$park['area']}')";

    $dbc->exec($query);

    echo 'Inserted ID: ' . $dbc->lastInsertId() . PHP_EOL;
}