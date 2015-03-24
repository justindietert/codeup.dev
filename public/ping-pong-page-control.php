<?php

/**
 * The pageController function handles all processing for this page.
 * @return array An associative array of data to be used in rendering the html view.
 */

function pageController()
{
    // Initialize an empty data array.
    $data = array();
    $message = '';

    if(empty(inputHas('counter')) || escape(inputGet('counter')) == 0) {
        $counter = 0;
        $message = "Welcome to Ping Pong";
    } else {

        if(escape(inputGet('result')) == 'hit') {
            $counter = escape(inputGet('counter'));
            $message = "Game in progress";
        }

        if(escape(inputGet('result')) == 'miss') {
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