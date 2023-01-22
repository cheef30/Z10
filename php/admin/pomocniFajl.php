<?php
define('SLIKE_FOLDER', dirname(__DIR__) . '/../images/vesti/');

function navbar() {
    echo '<nav>
    <ul>
        <li><a href="pocetna.php">Početna</a></li>
        <li><a href="igre.php">Igre</a></li>
        <li><a href="">Takmičenja</a></li>
        <li><a href="">Timovi</a></li>
        <li><a href="">Mečevi</a></li>
        <li><a href="vesti.php">Vesti</a></li>
        <li><a href="odjava.php">Odjava</a></li>
    </ul>
</nav>';
}

function uploadSlike($fajl, &$imeSlike) {
    $putanja = SLIKE_FOLDER . basename($fajl["name"]);

    if (getimagesize($fajl["tmp_name"]) === false)
        return 'Niste izabrali sliku! Morate izabrati sliku!';

    if (file_exists($putanja))
        return 'Slika ' . $fajl["name"] . ' već postoji!';

    if (move_uploaded_file($fajl["tmp_name"], $putanja)){
        $imeSlike = basename($fajl['name']);
        return true;
    }
    else
        return 'Dogodila se greška prilikom otpremanja fajla!';
}