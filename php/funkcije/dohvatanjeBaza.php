<?php
include_once dirname(__DIR__) . '/klase/baza/baza.php';

function dohvatiSveVesti() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll('select * from VEST');

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiVesti($str, $velStr) {
    try {
        $baza = new Baza();

        $ukupno = $baza->selectOne('select count(*) as ukupno from VEST')['ukupno'];
        if ($str > $maxStr = round($ukupno / $velStr, 0, PHP_ROUND_HALF_UP))
            $str = $maxStr;

        $offset = $velStr * ($str - 1);
        $rez = $baza->selectAll("select * from VEST order by DATUM_VREME_UNOSA desc limit $offset, $velStr");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTakmicenja() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select t.*, i.NAZIV as NAZIV_IGRE from TAKMICENJE t join IGRA i on t.ID_IGRE = i.ID");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTakmicenjePoNazivu($naziv) {
    try {
        $baza = new Baza();
        $red = $baza->selectOne("select * from TAKMICENJE where NAZIV = '$naziv'");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiIgre() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from IGRA");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiIgru($idIgre) {
    try {
        $baza = new Baza();
        $red = $baza->selectOne("select * from IGRA where ID = $idIgre");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiMeceveZaTakmicenje($idTakmicenja) {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from MEC where ID_TAKMICENJA = $idTakmicenja");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTimoveRezultateZaMec($idMeca) {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from TIM_MEC where ID_MECA = $idMeca");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTim($idTima) {
    try {
        $baza = new Baza();
        $red = $baza->selectOne("select * from TIM where ID = $idTima");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiKorisnika($korIme, $lozinka) {
    try {
        $baza = new Baza();

        $lozinka = md5($lozinka);
        $red = $baza->selectOne("select * from KORISNICI where KORISNICKO_IME = '$korIme' and LOZINKA = '$lozinka'");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}