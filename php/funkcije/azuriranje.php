<?php
include_once dirname(__DIR__) . '/klase/baza/baza.php';

function azurirajRezultat($id, $rezultat) {
    $baza = new Baza();

    return $baza->executeNonQuery("UPDATE tim_mec SET REZULTAT=$rezultat WHERE ID=$id");
}

function azurirajLinkMeca($idMeca, $link) {
    $baza = new Baza();

    return $baza->executeNonQuery("UPDATE mec SET LINK='$link' WHERE ID = $idMeca");
}

function azurirajParametar($kljuc, $novaVrednost) {
    $baza = new Baza();

    return $baza->executeNonQuery("UPDATE parametri SET VREDNOST = '$novaVrednost' WHERE KLJUC = '$kljuc'");
}