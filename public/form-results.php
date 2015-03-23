<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$name = htmlspecialchars(strip_tags($name));
$number = htmlspecialchars(strip_tags($number));
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <h2>Name</h2>
    <p><?php echo $name; ?></p>
    <h2>Number</h2>
    <p><?php echo $number; ?></p>
    <a href="form-example.php">Back</a>
</body>
</html>