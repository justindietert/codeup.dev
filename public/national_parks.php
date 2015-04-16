<?php
    require_once '../park_logins.php';
    require_once '../db_connect.php';
    require_once '../Input.php';


    // PAGINATION
    //-------------------------------------------//

    $start = 0;
    $limit = 4;
    $page = 1;

    if (Input::has('page')) {
        $page = Input::get('page');

        if (is_numeric($page)) {
            $start = ($page - 1) * $limit;
        } 
    }

    $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :start");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->execute();

    $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $rows = $dbc->query("SELECT COUNT(*) FROM national_parks")->fetchColumn();
    $total = ceil($rows/$limit);


    // FORM
    //-------------------------------------------//

    $errors = [];
    $userInputs = [];
    $saveValues = [
        'name'        => '',
        'location'    => '',
        'date'        => '',
        'area'        => '',
        'description' => ''
    ];

    if(Input::get('submit')) {
        $saveValues = array_replace($saveValues, $_POST);
    }

    if (!empty($_POST)) {

        try {
            $userInputs['name'] = Input::getString('name');
        } catch (Exception $e) {
            $errors['name'] = $e->getMessage();
        }

        try {
            $userInputs['location'] = Input::getString('location');
        } catch (Exception $e) {
            $errors['location'] = $e->getMessage();
        }

        try {
            $userInputs['date_established'] = date('Y-m-d', strtotime(Input::getString('date')));
        } catch (Exception $e) {
            $errors['date'] = $e->getMessage();
        }

        try {
            $userInputs['area'] = Input::notZero(Input::getNumber('area'));
        } catch (Exception $e) {
            $errors['area'] = $e->getMessage();
        }

        try {
            $userInputs['description'] = Input::getString('description');
        } catch (Exception $e) {
            $errors['description'] = $e->getMessage();
        }

        // If there are no errors, submit the data
        if (empty($errors)) {

            $sql = "INSERT INTO national_parks (  name,  location,  date_established,  area_in_acres,  description  ) 
                                        VALUES ( :name, :location, :date_established, :area_in_acres, :description  )";

            $query = $dbc->prepare($sql);
            $query->bindValue(':name', $userInputs['name'], PDO::PARAM_STR);
            $query->bindValue(':location', $userInputs['location'], PDO::PARAM_STR);
            $query->bindValue(':date_established', $userInputs['date_established'], PDO::PARAM_STR);
            $query->bindValue(':area_in_acres', $userInputs['area'], PDO::PARAM_STR);
            $query->bindValue(':description', $userInputs['description'], PDO::PARAM_STR);
            $query->execute();

            // Clear form fields when submit is successful
            $saveValues = [
                'name'        => '',
                'location'    => '',
                'date'        => '',
                'area'        => '',
                'description' => ''
            ];

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>National Parks</title>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/parks.css">
</head>
<body>
    <hr class="bar">

    <div class="container">

        <section id="main">
            <h1>National Parks</h1>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Date Est.</th>
                        <th>Area in Acres</th> 
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($page > $total || !is_numeric($page)) { ?>
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
                <?php if ($page > $total || !is_numeric($page)): ?>

                        <li><a href="?page=1">Back</a></li>

                    <?php else: ?>

                        <?php if($page > 1): ?>
                            <li><span id="prev"><a href="?page=<?php echo $page-1; ?>">Previous</a></span></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total; $i++): ?>
                            <?php if($i == $page): ?>
                                <li class="current"><?php echo $i; ?></li>
                            <?php else: ?>
                                <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if($page != $total): ?>
                            <li><span id='next'><a href="?page=<?php echo $page+1; ?>">Next</a></span></li>
                        <?php endif; ?>

                <?php endif; ?>
            </ul>
        </nav>

        <section id="form">
            <h2 id="add">Add a Park</h2>
            <form method="POST" action="#add">
                <div class="inputs">
                    <!-- <label for="name">Name</label> -->
                    <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $saveValues['name']; ?>">
                    <span class="error">* <?php if(array_key_exists('name', $errors)) { echo $errors['name']; } ?></span>
                    

                    <!-- <label for="location">Location</label> -->
                    <input type="text" name="location" id="location" placeholder="Location" value="<?php echo $saveValues['location']; ?>">
                    <span class="error">* <?php if(array_key_exists('location', $errors)) { echo $errors['location']; } ?></span>
                    

                    <!-- <label for="date">Date Est.</label> -->
                    <input type="text" name="date" id="date" placeholder="Date Established" value="<?php echo $saveValues['date']; ?>">
                    <span class="error">* <?php if(array_key_exists('date', $errors)) { echo $errors['date']; } ?></span>
                    

                    <!-- <label for="area">Area (in acres)</label> -->
                    <input type="text" name="area" id="area" placeholder="Area (in acres)" value="<?php echo $saveValues['area']; ?>">
                    <span class="error">* <?php if(array_key_exists('area', $errors)) { echo $errors['area']; } ?></span>
                    
                </div>
                
                <div id="textarea">
                    <!-- <label for="description">Description</label> -->
                    <textarea name="description" id="description" rows="10" cols="75" placeholder="Description"><?php echo $saveValues['description']; ?></textarea>
                    <div class="error" id="descErr">* <?php if(array_key_exists('description', $errors)) { echo $errors['description']; } ?></div>
                </div>
                
                <div id="submit">
                    <input name="submit" type="submit" value="Submit" class="submit">
                </div>
            </form>
        </section>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $("#date").datepicker();
        });
    </script>
</body>
</html>

