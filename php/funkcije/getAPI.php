<?php
include_once 'dohvatanjeBaza.php';
include_once 'dohvatanjeSer.php';
include_once 'kljucevi.php';
header('Content-Type: application/json');

$result = array();

if( !isset($_GET[$obj]))
    $result[$err] = 'Nije prosledjen objekat koji zelite da dohvatite!';

if (!isset($result[$err]))
    switch ($_GET[$obj]) {
        case 'vesti':
            $result[$res] = dohvatiVestiSer();
            break;
        case 'takmicenje':
            $naziv = $_GET['naziv'];

            if (!isset($naziv))
            {
                $result[$err] = 'Niste prosledili naziv!';
                break;
            }
            $result[$res] = dohvatiTakmicenjePoNazivuSer($naziv);
            break;
        default:
            $obj = $_GET[$obj];
            $result[$err] = "Objekat $obj ne postoji!";
            break;
    }

echo json_encode($result);