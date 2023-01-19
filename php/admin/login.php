<?php
session_start();

if (isset($_SESSION['korIme'])) {
    header('Location: pocetna.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="korIme">Korisničko ime:</label><br><input type="text" name="korIme"><br>
        <label for="lozinka">Lozinka:</label><br><input type="password" name="lozinka"><br>
        <button type="submit">Uloguj se</button>
    </form>
    <?php
        if (isset($_GET['err']))
            echo '<p>' . $_GET['err'] . '</p>';
    ?>
</body>
</html>
<?php
include_once dirname(__DIR__) . '/funkcije/dohvatanjeBaza.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err = NULL;
    if (isset($_POST['korIme']) && isset($_POST['lozinka'])) {
        $korIme = $_POST['korIme'];
        $loz = $_POST['lozinka'];

        if (empty(trim($korIme)))
            $err = 'Niste uneli korisničko ime!';
        else if (empty(trim($loz)))
            $err = 'Niste uneli lozinku!';

        if (!isset($err) && proveriLogin($korIme, $loz)){
            session_start();
            $_SESSION['korIme'] = $korIme;
            $_SESSION['loz'] = $loz;

            header("Location: pocetna.php");
            exit();
        }

        if (!isset($err))
            $err = 'Niste uneli dobro korisničko ime ili lozinku!';
    }
    else
        $err = 'Nije prosleđeno korisničko ime ili lozinka!';

    if (isset($err))
        header("Location: login.php?err=$err");
}

function proveriLogin($korIme, $loz) {
    $rez = dohvatiKorisnika($korIme, $loz);

    return $rez !== false;
}