<?php
include dirname(__DIR__) . '/klase/baza/baza.php';

function dodajPretplatnika($mejl) {
    $mejl = trim($mejl);
    $baza = new Baza();

    return $baza->executeNonQuery("INSERT IGNORE INTO MAIL_PRETPLATNICI_VESTI (MEJL_ADRESA) VALUES ('$mejl')");
}