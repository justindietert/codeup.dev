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

    // Add data to be used in the html view.
    if(!isset($_GET['counter'])) {
        $counter = 0;

    } elseif ($_GET['direction'] == 'up') {
        $counter = ++ $_GET['counter'];

    } elseif ($_GET['direction'] == 'down') {
        $counter = -- $_GET['counter'];
    }

    $data['counter'] = $counter;

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
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400' rel='stylesheet' type='text/css' />

    <!-- FontAwesome icons-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/counter.css" />

    <!-- Modernizr.js -->
    <script src="/js/foundation/vendor/modernizr.js"></script>
    </head>

    <body>
        <div class="row">
            <div class="small-8 columns small-centered text-center">
                <div>
                    <!-- Shows current counter value -->
                    <h2 class="large-number"><?= $counter; ?></h2>

                    <ul class="controls">
                        <li><a href="?direction=up&counter=<?= $counter; ?>" class="button alert small top"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a href="?direction=down&counter=<?= $counter; ?>" class="button alert small"><i class="fa fa-chevron-down"></i></a></li>
                    </ul>
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
