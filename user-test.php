<?php

require_once 'User.php';

// $justin = new User();
// $justin->first_name = "Justin";
// $justin->last_name = "J-da";
// $justin->email = "hello@email.com";
// $justin->birth_date = "1990-12-12";
// $justin->save();

// $justin = User::find(1);
// $justin->first_name = 'Jambo';
// $justin->last_name = 'Jenkins';
// $justin->save();

// print_r($justin->find(1));

// print_r($justin->attributes);

// $new = new User();
// $new->first_name = "Jim";
// $new->last_name = "Dietert";
// $new->email = "jim@email.com";
// $new->birth_date = "1980-01-01";
// $new->save();

// $kenny = new User();
// $kenny->first_name = 'Kenny';
// $kenny->last_name = 'Kenderson';
// $kenny->email = 'kenny@email.com';
// $kenny->birth_date = '1979-02-02';
// $kenny->save();

// print_r(User::all());

// User::delete(12);

$kenny = User::find(15);
$kenny->last_name = 'P';
$kenny->save();