<?php
include dirname(__DIR__) . '/klase/baza/baza.php';

function dohvatiVesti() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll('select * from VEST order by DATUM_VREME_UNOSA desc');

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTakmicenja() {
    try {
        $baza = new Baza();
        $red = $baza->selectAll("select t.*, i.NAZIV as NAZIV_IGRE from TAKMICENJE t join IGRA i on t.ID_IGRE = i.ID");

        return $red;
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