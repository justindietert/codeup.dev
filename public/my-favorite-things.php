<?php

function pageController() {
    $data['favs'] = ['typefaces', 'sushi', 'books', 'code', 'ramen'];

    return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favs</title>
<link href='http://fonts.googleapis.com/css?family=Old+Standard+TT:400,700' rel='stylesheet' type='text/css'>
    <style>
        html, body {
            font-size: 100%;
        }

        body {
            font-family: 'Old Standard TT', Georgia, serif;
            color: #001f3f;
        }

        table {
            font-size: 1.5rem;
        }

        td, th {
            padding-left: 0.5rem;
        }

        .container {
            width: 85%;
            margin: 0 auto;
            padding-top: 1rem;
        }

        .stripe {
            background-color: #f8f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <th>My Favorite Things</th>
            <?php foreach($favs as $fav): ?>
                <tr><td><?= $fav; ?></td></tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script src="/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $("tr:odd").addClass("stripe");
        });
    </script>
</body>
</html>