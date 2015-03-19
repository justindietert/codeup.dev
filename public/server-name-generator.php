<?php 

function getRandom($array) 
{
    $randomKey = array_rand($array);
    return trim($array[$randomKey]);
}

function pageController() 
{
    $data = [];
    $data['adjectives'] = ['exuberant', 'sly', 'bitter', 'fancy', 'nutty', 'juicy', 'icy', 'lavish', 'spicy', 'chunky'];
    $data['nouns'] = ['face', 'dog', 'gherkin', 'typeface', 'cashew', 'tomato', 'asteroid', 'tree', 'taco', 'salsa'];
    $data['randomAdj'] = getRandom($data['adjectives']);
    $data['randomNoun'] = getRandom($data['nouns']);

    return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Server Name Generator</title>
    <link href='http://fonts.googleapis.com/css?family=Abril+Fatface|Roboto' rel='stylesheet' type='text/css'>
    <style>
        html, body {
            font-size: 100%;
        }

        body {
            font-family: 'Abril Fatface', serif;
            color: #001f3f;
            background: #f2e5e2;
        }

        .container {
            width: 95%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-size: 4rem;
            line-height: 4.25rem;
            /*margin-bottom: 0.25rem;*/
        }

        p {
            font-family: 'Roboto';
        }

        .to-upper {
            text-transform: uppercase;
            letter-spacing: 0.0875rem;
        }

        .center {
            text-align: center;
        }

        .sixty {
            width: 60%;
        }

        hr {
            border: 1px 0 0 0;
            border-top-color: #001f3f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $randomAdj . '-' . $randomNoun; ?></h1>
        <hr class="sixty">
        <p class="to-upper center">Your Random Server Name</p>
    </div>
</body>
</html>