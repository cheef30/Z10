<?php
include_once dirname(__DIR__) . '/klase/baza/baza.php';

function dodajPretplatnika($mejl) {
    $mejl = trim($mejl);
    $baza = new Baza();

    return $baza->executeNonQuery("INSERT IGNORE INTO mail_pretplatnici_vesti (MEJL_ADRESA) VALUES ('$mejl')");
}

function registrujKorisnika($mejl, $korIme, $lozinka) {
    $mejl = trim($mejl);
    $korIme = trim($korIme);
    $lozinka = md5($lozinka);

    $baza = new Baza();

    return $baza->executeNonQuery("INSERT IGNORE INTO korisnici (MEJL_ADRESA, KORISNICKO_IME, LOZINKA) VALUES ('$mejl', '$korIme', '$lozinka')");
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

function dodajYTVideo($ytVideo) {
    $id = $ytVideo->id;
    $datumVreme = $ytVideo->dateTime;
    $idKanala = $ytVideo->channelId;

    $baza = new Baza();
    
    return $baza->executeNonQuery("INSERT IGNORE INTO ytvideo (ID, DATUM_VREME_POSTAVLJANJA, ID_YT_KANALA) VALUES ('$id', '$datumVreme', '$idKanala')");
}