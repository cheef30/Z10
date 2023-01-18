<?php
include dirname(__DIR__) . '/klase/modeli/vest.php';
include_once dirname(__DIR__) . '/klase/modeli/igra.php';
include dirname(__DIR__) . '/klase/modeli/takmicenje.php';
include dirname(__DIR__) . '/klase/modeli/mec.php';
include dirname(__DIR__) . '/klase/modeli/tim.php';
include dirname(__DIR__) . '/klase/modeli/timRezultat.php';
include_once 'dohvatanjeBaza.php';
include_once 'dohvatanjeSer.php';

function serVestIzBaze($red) {
    $vest = new Vest($red['ID'], $red['NASLOV'], $red['SLIKA'], $red['DATUM_VREME_UNOSA']);

    return $vest;
}

function serViseVestiIzBaze($rezUpita) {
    $vesti = array();

    while ($red = $rezUpita->fetch_assoc()) {
        array_push($vesti, serVestIzBaze($red));
    }

    return $vesti;
}

function serIgruIzBaze($red) {
    $igra = new Igra($red['ID'], $red['NAZIV']);

    return $igra;
}

function serTakmicenjeIzBaze($red) {
    $takmicenje = new Takmicenje($red['ID'], dohvatiIgruSer($red['ID_IGRE']), $red['NAZIV'], dohvatiMeceveZaTakmicenjeSer($red['ID']));

    return $takmicenje;
}

function serMecIzBaze($red) {
    $mec = new Mec($red['ID'], dohvatiTimoveRezultateZaMecSer($red['ID']), $red['DATUM'], $red['VREME']);

    return $mec;
}

function serMeceveIzBaze($rezUpita) {
    $mecevi = array();

    while ($red = $rezUpita->fetch_assoc()) {
        array_push($mecevi, serMecIzBaze($red));
    }

    return $mecevi;
}

function serTimRezultatIzBaze($red) {
    $timRezultat = new TimRezultat($red['ID'], dohvatiTimSer($red['ID_TIMA']), $red['REZULTAT']);

    return $timRezultat;
}

function serViseTimovaRezultataIzBaze($rezUpita) {
    $timoviRezultati = array();

    while ($red = $rezUpita->fetch_assoc()) {
        array_push($timoviRezultati, serTimRezultatIzBaze($red));
    }

    return $timoviRezultati;
}

function serTimIzBaze($red) {
    $tim = new Tim($red['ID'], $red['NAZIV'], $red['LOGO']);

    return $tim;
}