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
    <title>Vesti</title>
    <link rel="stylesheet" href="css/stil.css">
</head>
<body>
<?php
    include_once 'pomocniFajl.php';
    navbar();
?>
    <h1>Pregled/dodavanje vesti</h1>
    <h3>Forma za dodavanje</h3>
    <?php
    if (isset($_GET['por'])) {
        $poruka = $_GET['por'];
        echo "<p>$poruka</p>";
    }
    ?>
    <form action="vesti.php" method="POST" enctype="multipart/form-data">
        <label for="naslov">Naslov:</label><input type="text" name="naslov" id="naslov"><br>
        <label for="slika">Slika:</label><input type="file" name="slika" id="slika"><br>
        <label for="link">Link:</label><input type="text" name="link" id="link"><br>
        <button type="submit">Dodaj</button>
    </form>
    <h3>Pregled vesti:</h3>
    <table>
        <thead>
            <th>ID</th>
            <th>Naslov</th>
            <th>Slika</th>
            <th>Link</th>
            <th>Datum i vreme unosa</th>
        </thead>
        <tbody>
        <?php
            include_once dirname(__DIR__) . '/funkcije/dohvatanjeSer.php';

            $vesti = dohvatiSveVestiSer();

            foreach ($vesti as $vest) {
                $id = $vest->id;
                $naslov = $vest->naslov;
                $slika = $vest->putanjaSlike;
                $link = $vest->link;
                $datumVreme = $vest->datumVremeUnosa;

                echo "
                    <tr>
                        <td>$id</td>
                        <td>$naslov</td>
                        <td>$slika</td>
                        <td>$link</td>
                        <td>$datumVreme</td>
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
    if (empty($_FILES['slika']['tmp_name']))
        $err = 'Niste izabrali sliku!';

    if (empty($_POST['naslov']))
        $err = 'Niste uneli naslov!';

    if (empty($_POST['link']))
        $err = 'Niste uneli link!';
    else if (!filter_var($_POST['link'], FILTER_VALIDATE_URL))
        $err = 'Link koji ste uneli nije u validnom formatu!';

    if (!empty($err)) {
        header("Location: vesti.php?por=$err");
        exit();
    }

    if ($err = uploadSlike($_FILES['slika'], 'vesti', $imeSlike) !== true) {
        header("Location: vesti.php?por=$err");
        exit();
    }
    
    dodajVest($_POST['naslov'], $imeSlike, $_POST['link']);
    header("Location: vesti.php?por=Uspešno ste dodali vest!");
}