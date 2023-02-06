<?php
session_start();
include_once dirname(__DIR__) . '/funkcije/azuriranje.php';

if (!isset($_SESSION['korIme'])) {
    header('Location: login.php');
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rezultati = $_POST['rezultat'];
    $idjevi = $_POST['id'];
    $idMeca = $_POST['idMeca'];
    $link = $_POST['link'];

    for ($i=0; $i < count($idjevi); $i++) { 
        azurirajRezultat($idjevi[$i], $rezultati[$i]);
    }

    azurirajLinkMeca($idMeca, $link);

    header("Location: rezultat.php?idMeca=$idMeca");
    die();
}

$id = $_GET['idMeca'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultat meča</title>
    <link rel="stylesheet" href="css/stil.css">
</head>
<body>
<?php
    include_once 'pomocniFajl.php';
    navbar();
?>
    <h3>Pregled meča:</h3>
    <?php
        include_once dirname(__DIR__) . '/funkcije/dohvatanjeSer.php';

        $mecTakmicenjeIgra = dohvatiMecSer($id);
        
        $nazivIgre = $mecTakmicenjeIgra->nazivIgre;
        $nazivTakmicenja = $mecTakmicenjeIgra->nazivTakmicenja;
        $datum = $mecTakmicenjeIgra->mec->datum;
        $vreme = $mecTakmicenjeIgra->mec->vreme;
        $link = $mecTakmicenjeIgra->mec->link;

        echo "<h4>$nazivIgre</h4>
            <h4>$nazivTakmicenja</h4>
            <p>Datum: <b>$datum</b>; Vreme: <b>$vreme</b></p>";
    ?>
    <h4>Timovi:</h4>
    <form action="rezultat.php" method="post">
        <?php
            echo "<input type='hidden' name='idMeca' value=$id>";

            foreach ($mecTakmicenjeIgra->mec->timoviRezultati as $timRezultat) {
                $nazivTima = $timRezultat->tim->naziv;
                $rezultat = $timRezultat->rezultat ?? "";
                $idTimRez = $timRezultat->id;

                echo "
                    <p><b>$nazivTima</b>, rezultat:<input name='rezultat[]' type='number' value=$rezultat><input name='id[]' type='hidden' value=$idTimRez></p>
                ";
            }

            echo "<label for='link'>Link za gledanje meca:</label><input type='text' id='link' name='link' value=$link><br>";
        ?>
        <button type="submit">Izmeni</button>
    </form>
</body>
</html>