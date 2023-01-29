<?php
include_once dirname(__DIR__) . '/klase/baza/baza.php';

function dodajPretplatnika($mejl) {
    $mejl = trim($mejl);
    $baza = new Baza();

    return $baza->executeNonQuery("INSERT IGNORE INTO mail_pretplatnici_vesti (MEJL_ADRESA) VALUES ('$mejl')");
}

function dodajIgru($naziv) {
    $baza = new Baza();

    return $baza->executeNonQuery("INSERT INTO igra (NAZIV) VALUES ('$naziv')");
}

function dodajVest($naslov, $slika, $link) {
    $baza = new Baza();

    $naslov = str_replace('\'', '\\\'', $naslov);

    return $baza->executeNonQuery("INSERT INTO vest (NASLOV, SLIKA, LINK) VALUES ('$naslov', '$slika', '$link')");
}