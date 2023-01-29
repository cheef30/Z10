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
    <title>Mejlovi</title>
    <link rel="stylesheet" href="css/stil.css">
</head>
<body>
<?php
    include_once 'pomocniFajl.php';
    navbar();
?>
    <h3>Pregled mejlova:</h3>
    <table>
        <thead>
            <th>ID</th>
            <th>Mejl adresa</th>
        </thead>
        <tbody>
            <?php
                include_once dirname(__DIR__) . '/funkcije/dohvatanjeBaza.php';

                $mejlovi = dohvatiMejlove();

                while ($mejl = $mejlovi->fetch_assoc()) {
                    $id = $mejl['ID'];
                    $adresa = $mejl['MEJL_ADRESA'];

                    echo "
                        <tr>
                            <td>$id</td>
                            <td>$adresa</td>
                        </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>