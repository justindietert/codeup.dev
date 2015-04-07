<?php
    require_once '../park_logins.php';
    require_once '../db_connect.php';

    function getParks($dbc)
    {
        // Bring the $dbc variable into scope somehow
        return $dbc->query('SELECT * FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);
    }

    $parks = getParks($dbc);
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
        }

        td, 
        th {
            padding: 0.5em 1em;
            border-right: 1px dotted #aaa;
        }

        td:last-child,
        th:last-child {
            border-right: none;
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
                <?php foreach ($parks as $park): ?>
                    <tr>
                        <td><?php echo $park['id']; ?></td>
                        <td><?php echo $park['name']; ?></td>
                        <td><?php echo $park['location']; ?></td>
                        <td><?php echo $park['date_established']; ?></td>
                        <td><?php echo $park['area_in_acres']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("tr:odd").addClass("stripe");
        });
    </script>
</body>
</html>

