<?php
include_once dirname(__DIR__) . '/klase/baza/baza.php';

function azurirajRezultat($id, $rezultat) {
    $baza = new Baza();

    return $baza->executeNonQuery("UPDATE tim_mec SET REZULTAT=$rezultat WHERE ID=$id");
}