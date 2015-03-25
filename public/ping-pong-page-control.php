<?php
require_once 'functions.php';
require_once '../Input.php';
/**
 * The pageController function handles all processing for this page.
 * @return array An associative array of data to be used in rendering the html view.
 */

function pageController()
{
    // Initialize an empty data array.
    $data = array();
    $message = '';

    if(empty(Input::has('counter')) || escape(Input::get('counter')) == 0) {
        $counter = 0;
        $message = "Welcome to Ping Pong";
    } else {

        if(escape(Input::get('result')) == 'hit') {
            $counter = escape(Input::get('counter'));
            $message = "Game in progress";
        }

        if(escape(Input::get('result')) == 'miss') {
            // end game
            $counter = 0;
        }
    }

    $data['counter'] = $counter;
    $data['message'] = $message;

    // Return the completed data array.
    return $data;    
}

// Call the pageController function and extract all the returned array as local variables.
extract(pageController());