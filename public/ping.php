<?php

// Require or include statements are allowed here. All other code goes in the pageController function.

/**
 * The pageController function handles all processing for this page.
 * @return array An associative array of data to be used in rendering the html view.
 */

function pageController()
{
    // Initialize an empty data array.
    $data = array();
    $message = '';

    if(empty($_GET['counter'])) {
        $counter = 0;
        $message = "Welcome to Ping Pong";
    } else {

        if($_GET['result'] == 'miss') {
            // end game
            $counter = 0;
        }

        if($_GET['result'] == 'hit') {
            $counter = $_GET['counter'];
            $message = "Ping Pong game in progress...";
        }
    }

    $data['counter'] = $counter;
    $data['message'] = $message;

    // Return the completed data array.
    return $data;    
}

// Call the pageController function and extract all the returned array as local variables.
extract(pageController());

// Only use echo, conditionals, and loops anywhere within the HTML.
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Counter</title>

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="/css/normalize.css" />

    <!-- Foundation CSS -->
    <link rel="stylesheet" href="/css/foundation.css" />

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200,400|Source+Sans+Pro:200,300,400' rel='stylesheet' type='text/css' />

    <!-- FontAwesome icons-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/pingpong.css" />

    <!-- Modernizr.js -->
    <script src="/js/foundation/vendor/modernizr.js"></script>
    </head>

    <body>
        <div class="row top">
            <div class="small-8 columns small-centered text-center">
                <h1><?= $message; ?></h1>
            </div>
        </div>

        <div class="row middle">
            <div class="small-8 columns small-centered text-center">
                <div class="panel">
                    <!-- Shows current counter value -->
                    <h2 class="large-number"><?= $counter; ?></h2>
                </div>
                
                <div class="controls">
                    <a href="pong.php?result=hit&counter=<?= $counter+1; ?>" class="button small">HIT!</a>&nbsp;
                    <a href="pong.php?result=miss&counter=<?= $counter=0; ?>" class="button small">MISS</a>               
                </div>
            </div>
        </div>

        <script src="/js/foundation/vendor/jquery.js"></script>
        <script src="/js/foundation/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
