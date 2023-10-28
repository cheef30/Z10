<?php
include_once 'dohvatanjeBaza.php';

function proveriPostojanjeKorisnika($mejl, $korIme) {
    $rez = postojiKorisnik($mejl, $korIme);

    return $rez;
}