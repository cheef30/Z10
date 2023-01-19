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
    <title>Igre</title>
    <link rel="stylesheet" href="css/stil.css">
</head>
<body>
<?php
    include_once 'pomocniFajl.php';
    navbar();
?>
    <h1>Pregled/dodavanje igara</h1>
    <h3>Forma za dodavanje</h3>
    <form action="igre.php" method="POST">
        <label for="naziv">Naziv:</label><input type="text" name="naziv"><br>
        <button type="submit">Dodaj</button>
    </form>
</body>
</html>