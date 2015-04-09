<?php
    require_once '../park_logins.php';
    require_once '../db_connect.php';
    require_once '../Input.php';

    $start = 0;
    $limit = 4;
    $id = 1;

    if (Input::has('id')) {
        $id = Input::get('id');

        if (is_numeric($id)) {
            $start = ($id - 1) * $limit;
        } 
    }

    $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :start");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->execute();

    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            height: 100%;
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
            width: 95%;
            margin: 0 auto;
            min-height: 100%;
            position: relative;
        }

        section#main {
            padding-top: 0.5em;
            padding-bottom: 5em;
        }

        section h1 {
            font-size: 2em;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            min-width: 62.5em;
        }

        tbody tr:first-child {
            border-top: 1px solid #ccc;
        }

        tbody tr {
            border-bottom: 1px solid #D5E9E0;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        td, 
        th {
            padding: 0.75em 1em 0.875em 1em;
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

        nav {
            height: 5em;
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            text-align: center;
        }

        ul, ol {
            list-style: none;
        }

        #prev:after,
        #next:before {
            content: ' | ';
            color: #222;
        }

        ul.page {
            padding-top: 1.5em;
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

        <section id="main">
            <h1>National Parks</h1>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Date&nbsp;Est.</th>
                        <th>Area&nbsp;in&nbsp;Acres</th> 
                        <th>Description</th>
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
                            <td><?php echo $park['name']; ?></td>
                            <td><?php echo $park['location']; ?></td>
                            <td><?php echo $park['date_established']; ?></td>
                            <td><?php echo $park['area_in_acres']; ?></td>
                            <td><?php echo $park['description']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <?php } ?>
                </tbody>
            </table>
        </section>
        
        <nav>

            <ul class='page'>
                
                <?php if ($id > $total || !is_numeric($id)) { ?>

                        <li><a href="?id=1">Back</a></li>

                    <?php } else { ?>

                        <?php if($id > 1) { ?>
                            <li><span id="prev"><a href="?id=<?php echo $id-1; ?>">Previous</a></span></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total; $i++) { ?>

                            <?php if($i == $id) { ?>
                                <li class="current"><?php echo $i; ?></li>
                            <?php } else { ?>
                                <li><a href="?id=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        <?php } ?>

                        <?php if($id != $total) { ?>
                            <li><span id='next'><a href="?id=<?php echo $id+1; ?>">Next</a></span></li>
                        <?php } ?>
                        
                <?php } ?>

            </ul>

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

