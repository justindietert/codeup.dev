<?php

require_once 'ping-pong-page-control.php';

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
                    <a href="pong.php?result=hit&counter=<?= $counter+1; ?>" class="button small">HIT!</a><span class="hide-for-small-only inline">&nbsp;&nbsp;<a href="pong.php?result=miss&counter=<?= $counter=0; ?>" class="button small">MISS</a></span>
                    <div class="show-for-small-only">
                        <a href="pong.php?result=miss&counter=<?= $counter=0; ?>" class="button small">MISS</a>
                    </div>        
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
