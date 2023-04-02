<?php
include_once dirname(__DIR__) . '/klase/baza/baza.php';

/*enum TipMeca: int {
    case BUDUCI = 1;
    case PROSLI = 2;
}*/

function dohvatiSveVesti() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll('select * from vest');

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiVesti($str, $velStr) {
    try {
        $baza = new Baza();

        /*$ukupno = $baza->selectOne('select count(*) as ukupno from VEST')['ukupno'];
        if ($str > $maxStr = ceil($ukupno / $velStr))
            $str = $maxStr;*/

        $offset = $velStr * ($str - 1);
        $rez = $baza->selectAll("select * from vest order by DATUM_VREME_UNOSA desc limit $offset, $velStr");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiYTVidee($str, $velStr, $idKanala) {
    try {
        $baza = new Baza();

        $offset = $velStr * ($str - 1);

        $upit = "select * from ytvideo";

        if (isset($idKanala)) {
            $upit .= " where ID_YT_KANALA = '$idKanala'";
        }

        $upit .= " order by DATUM_VREME_POSTAVLJANJA desc limit $offset, $velStr";

        $rez = $baza->selectAll($upit);

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTakmicenja() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select t.*, i.NAZIV as NAZIV_IGRE from takmicenje t join IGRA i on t.ID_IGRE = i.ID");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTakmicenjePoNazivu($naziv) {
    try {
        $baza = new Baza();
        $red = $baza->selectOne("select * from takmicenje where NAZIV = '$naziv'");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiIgre() {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from igra");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiIgru($idIgre) {
    try {
        $baza = new Baza();
        $red = $baza->selectOne("select * from igra where ID = $idIgre");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiMeceveZaTakmicenje($idTakmicenja) {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from mec where ID_TAKMICENJA = $idTakmicenja ORDER BY DATUM, VREME");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiMeceveSve($str, $velStr, $sortPo, $tipMeca, $idTakmicenja) {
    try {
        $baza = new Baza();

        $ukupno = $baza->selectOne('select count(*) as ukupno from mec')['ukupno'];
        if ($str > $maxStr = round($ukupno / $velStr, 0, PHP_ROUND_HALF_UP))
            $str = $maxStr;

        $offset = $velStr * ($str - 1);
        
        $upit = "select m.*, t.NAZIV AS NAZIV_TAKMICENJA, i.naziv as NAZIV_IGRE
                from mec m
                    join takmicenje t on t.id = m.ID_TAKMICENJA
                    join igra i on i.id = t.id_igre\n";

        if ($tipMeca == 1)
            $upit .= "where (cast(concat(datum, ' ', vreme) as datetime) > current_timestamp() or (select count(*) from tim_mec where ID_MECA = m.ID and REZULTAT is null) > 0)\n";
        else if ($tipMeca == 2)
            $upit .= "where cast(concat(datum, ' ', vreme) as datetime) < current_timestamp()\n";

        if (isset($idTakmicenja))
        {
            if ($tipMeca == 1 || $tipMeca == 2)
                $upit .= "and m.ID_TAKMICENJA = $idTakmicenja\n";
            else
                $upit .= "where m.ID_TAKMICENJA = $idTakmicenja\n";
        }

        if (!empty($sortPo)) {
            $upit .= "order by $sortPo\n";
        }
        
        $upit .= "limit $offset, $velStr";
        $rez = $baza->selectAll($upit);

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiMec($id) {
    try {
        $baza = new Baza();
        $rez = $baza->selectOne("select m.*, t.NAZIV AS NAZIV_TAKMICENJA, i.naziv as NAZIV_IGRE
        from mec m
            join takmicenje t on t.id = m.ID_TAKMICENJA
            join igra i on i.id = t.id_igre
        where m.id = $id\n");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTimoveRezultateZaMec($idMeca) {
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from tim_mec where ID_MECA = $idMeca");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiTim($idTima) {
    try {
        $baza = new Baza();
        $red = $baza->selectOne("select * from tim where ID = $idTima");

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
        $red = $baza->selectOne("select * from korisnici where KORISNICKO_IME = '$korIme' and LOZINKA = '$lozinka'");

        return $red;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiMejlove()
{
    try {
        $baza = new Baza();
        $rez = $baza->selectAll("select * from mail_pretplatnici_vesti");

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}

function dohvatiVrednostParametra($kljuc) {
    try {
        $baza = new Baza();
        $rez = $baza->selectOne("select VREDNOST from parametri where KLJUC = '$kljuc'")['VREDNOST'];

        return $rez;
    }
    catch (Exception $e) {
        return $e->getMessage();
    }
}