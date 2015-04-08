<?php
    require_once '../park_logins.php';
    require_once '../db_connect.php';
    require_once '../Input.php';

    // function getParks($dbc)
    // {
    //     return $dbc->query("SELECT * FROM national_parks LIMIT $limit OFFSET $start")->fetchAll(PDO::FETCH_ASSOC);
    // }

    // $parks = getParks($dbc);

    $start = 0;
    $limit = 4;
    $id = 1;

    if (Input::has('id')) {
        $id = Input::get('id');

        if (is_numeric($id)) {
            $start = ($id - 1) * $limit;
        } 
    }

    $parks = $dbc->query("SELECT * FROM national_parks LIMIT $limit OFFSET $start")->fetchAll(PDO::FETCH_ASSOC);

    $rows = $dbc->query("SELECT COUNT(*) FROM national_parks")->fetchColumn();
    $total = ceil($rows/$limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>National Parks</title>
    <style>
    
        html, body {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Georgia;
            font-size: 100%;
            line-height: 1.5;
            position: relative;
            color: #222;
            background: #EAF4F0;
        }
        
        .bar {
            width: 100%;
            position: absolute;
            top: 0;
            height: 0.5em;
            background: #222;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 1em;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        tbody tr:first-child {
            border-top: 1px solid #ccc;
        }

        td, 
        th {
            padding: 0.75em 1em;
            border-right: 1px dotted #aaa;
        }

        td:last-child,
        th:last-child {
            border-right: none;
        }

        th:first-child,
        td:first-child {
            text-align: right;
        }

        th {
            text-transform: uppercase;
            letter-spacing: 0.125em;
            font-weight: normal;
            text-align: left;
        }

        .stripe {
            background-color: #D5E9E0;
        }

        nav {
            float: right;
            padding-top: 1.5em;
        }

        ul, ol {
            list-style: none;
        }

        #prev:after,
        #next:before {
            content: ' | ';
            color: #222;
        }

        .page {
            margin: 0;
            padding: 0;
        }

        .page li {
            list-style: none;
            display: inline-block;
        }

        .page li a, .current {
            padding: 0 0.313em 0 0.313em;
        }

        .page li a:link,
        .page li a:visited {
            text-decoration: none;
            color: #3D9970;
        }

        .page li a:hover {
            color: #444;
        }

        .current {
            font-weight:bold;
            color: #222;
        }

        .no-results:first-child {
            text-align: left;
        }

    </style>
</head>
<body>
    <div class="bar"></div>

    <div class="container">
        <h1>National Parks</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Date Established</th>
                    <th>Area in Acres</th> 
                </tr>
            </thead>
            <tbody>
                <?php if($id > $total || !is_numeric($id)) { ?>
                    <tr>
                        <td class="no-results" colspan="5">No results to display.</td>
                    </tr>
                <?php } else { ?>

                <?php foreach ($parks as $park): ?>
                    <tr>
                        <td><?php echo $park['id']; ?></td>
                        <td><?php echo $park['name']; ?></td>
                        <td><?php echo $park['location']; ?></td>
                        <td><?php echo $park['date_established']; ?></td>
                        <td><?php echo $park['area_in_acres']; ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php } ?>
            </tbody>
        </table>
        
        <nav>
            <?php

                echo "<ul class='page'>";

                if ($id > $total || !is_numeric($id)) {
                        echo "<li><a href='?id=1'>Back</a></li>"; 
                } else {

                    if($id > 1) {
                        echo "<li><span id='prev'><a href='?id=".($id-1)."'>Previous</a></span></li>";
                    }

                    for ($i = 1; $i <= $total; $i++) {

                        if($i == $id) { 
                            echo "<li class='current'>".$i."</li>"; 
                        } else { 
                            echo "<li><a href='?id=".$i."'>".$i."</a></li>"; 
                        }
                    }

                    if($id != $total) {
                        echo "<li><span id='next'><a href='?id=".($id+1)."'>Next</a></span></li>";
                    }
                }

                echo "</ul>";
            ?>
        </nav>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("tr:odd").addClass("stripe");
        });
    </script>
</body>
</html>

