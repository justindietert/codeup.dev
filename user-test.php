<?php

require_once 'User.php';

$justin = new User();
$justin->first_name = "Justin";
$justin->last_name = "Dietert";
$justin->email = "hello@email.com";
$justin->birth_date = "1990-12-12";
// $justin->save();

// print_r($justin->find(1));

print_r($justin->attributes);