<?php
session_start();

if (!isset($_SESSION['korIme'])) {
    header('Location: login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin početna</title>
    <link rel="stylesheet" href="css/stil.css">
</head>
<body>
    <?php
    include_once 'pomocniFajl.php';
    navbar();
    ?>
    <h1>Izaberite kategoriju iz menija.</h1>
</body>
</html>