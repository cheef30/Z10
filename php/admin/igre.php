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
    <?php
    if (isset($_GET['por'])) {
        $poruka = $_GET['por'];
        echo "<p>$poruka</p>";
    }
    ?>
    <form action="igre.php" method="POST">
        <label for="naziv">Naziv:</label><input type="text" name="naziv" id="naziv"><br>
        <button type="submit">Dodaj</button>
    </form>
    <h3>Pregled igara:</h3>
    <table>
        <thead>
            <th>ID</th>
            <th>Naziv</th>
        </thead>
        <tbody>
            <?php
                include_once dirname(__DIR__) . '/funkcije/dohvatanjeSer.php';

                $igre = dohvatiIgreSer();

                foreach ($igre as $igra) {
                    $id = $igra->id;
                    $naziv = $igra->naziv;

                    echo "
                        <tr>
                            <td>$id</td>
                            <td>$naziv</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
include_once dirname(__DIR__) . '/funkcije/ubacivanje.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naziv = $_POST['naziv'];

    if (empty($naziv)) {
        header('Location: igre.php?por=Niste uneli naziv!');
        exit();
    }

    dodajIgru($naziv);
    header('Location: igre.php?por=Uspešno ste dodali igru!');
}