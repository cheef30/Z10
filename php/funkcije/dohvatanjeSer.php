<?php
include_once 'dohvatanjeBaza.php';
include_once 'serijalizacija.php';

function dohvatiIgruSer($idIgre){
    return serIgruIzBaze(dohvatiIgru($idIgre));
}

function dohvatiMeceveZaTakmicenjeSer($idTakmicenja) {
    return serMeceveIzBaze(dohvatiMeceveZaTakmicenje($idTakmicenja));
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

function dohvatiVestiSer(){
    return serViseVestiIzBaze(dohvatiVesti());
}