<?php

require_once 'User.php';

// $justin = new User();
// $justin->first_name = "Justin";
// $justin->last_name = "J-da";
// $justin->email = "hello@email.com";
// $justin->birth_date = "1990-12-12";

$justin = User::find(1);
$justin->first_name = 'Jambo';
$justin->save();

// print_r($justin->find(1));

// print_r($justin->attributes);

// $new = new User();
// $new->first_name = "Jim";
// $new->last_name = "Dietert";
// $new->email = "jim@email.com";
// $new->birth_date = "1980-01-01";
// $new->save();