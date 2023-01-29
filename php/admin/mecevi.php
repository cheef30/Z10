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
    <title>Mecevi</title>
    <link rel="stylesheet" href="css/stil.css">
</head>
<body>
<?php
    include_once 'pomocniFajl.php';
    navbar();
?>
    <h3>Pregled mečeva:</h3>
    <table>
        <thead>
            <th>ID</th>
            <th>Timovi</th>
            <th>Takmičenje</th>
            <th>Igra</th>
            <th>Datum</th>
            <th>Vreme</th>
        </thead>
        <tbody>
            <?php
                include_once dirname(__DIR__) . '/funkcije/dohvatanjeSer.php';

                $meceviTakmicenjaIgre = dohvatiMeceveSer(1, 96, "datum desc, vreme desc", null, null);

                foreach ($meceviTakmicenjaIgre as $mecTakmicenjeIgra) {
                    $idMeca = $mecTakmicenjeIgra->mec->id;
                    $datum = $mecTakmicenjeIgra->mec->datum;
                    $vreme = $mecTakmicenjeIgra->mec->vreme;
                    $ispisTimova = vratiIspisTimova($mecTakmicenjeIgra->mec->timoviRezultati);
                    $nazivTakmicenja = $mecTakmicenjeIgra->nazivTakmicenja;
                    $nazivIgre = $mecTakmicenjeIgra->nazivIgre;

                    echo "
                        <tr>
                            <td>$idMeca</td>
                            <td>$ispisTimova</td>
                            <td>$nazivTakmicenja</td>
                            <td>$nazivIgre</td>
                            <td>$datum</td>
                            <td>$vreme</td>
                            <td><a href='rezultat.php?idMeca=$idMeca'>Izmeni rezultat</a></td>
                        </tr>
                    ";
                }

                function vratiIspisTimova($timoviRezultati) {
                    $ispis = "";

                    foreach ($timoviRezultati as $timRezultat) {
                        $naziv = $timRezultat->tim->naziv;

                        $ispis .= "$naziv - ";
                    }

                    return substr($ispis, 0, -3);
                }
            ?>
        </tbody>
    </table>
</body>
</html>