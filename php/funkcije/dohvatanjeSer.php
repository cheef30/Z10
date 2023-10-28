<?php
include_once 'dohvatanjeBaza.php';
include_once 'serijalizacija.php';

function dohvatiIgruSer($idIgre){
    return serIgruIzBaze(dohvatiIgru($idIgre));
}

function dohvatiMeceveZaTakmicenjeSer($idTakmicenja) {
    return serMeceveIzBaze(dohvatiMeceveZaTakmicenje($idTakmicenja));
}

function dohvatiMeceveSer($str, $velStr, $sortPo, $tipMeca, $idTakmicenja) {
    return serMeceveTakmicenjeIgraIzBaze(dohvatiMeceveSve($str, $velStr, $sortPo, $tipMeca, $idTakmicenja));
}

function dohvatiMecSer($id) {
    return serMecTakmicenjeIgraIzBaze(dohvatiMec($id));
}

function dohvatiTimoveRezultateZaMecSer($idMeca) {
    return serViseTimovaRezultataIzBaze(dohvatiTimoveRezultateZaMec($idMeca));
}

function dohvatiTimSer($idTima) {
    return serTimIzBaze(dohvatiTim($idTima));
}

function dohvatiTakmicenjePoNazivuSer($naziv) {
    return serTakmicenjeIzBaze(dohvatiTakmicenjePoNazivu($naziv));
}

function dohvatiVestiSer($str, $velStr){
    $str = $str ?? 1;
    $velStr = $velStr ?? 10;
    return serViseVestiIzBaze(dohvatiVesti($str, $velStr));
}

function dohvatiSveVestiSer() {
    $rez = dohvatiSveVesti();
    if (is_bool($rez))
        return array();

    return serViseVestiIzBaze($rez);
}

function dohvatiIgreSer() {
    return serViseIgaraIzBaze(dohvatiIgre());
}

function dohvatiYTVidSer($str, $velStr, $idKanala) {
    return serViseYTVidIzBaze(dohvatiYTVidee($str, $velStr, $idKanala));
}

function dohvatiKorisnikaSer($korIme, $lozinka) {
    $postoji = postojiKorisnikPoKorImenu($korIme);

    if (is_string($postoji))
        return $postoji;

    if (!$postoji)
        return "User '$korIme' is not registered!";

    $rez = dohvatiKorisnika($korIme, $lozinka);

    if (is_string($rez))
        return $rez;

    if (is_null($rez))
        return "Wrong password!";

    if (!$rez)
        return "Login failed due to a database error!";

    return serKorisnikaIzBaze($rez);
}