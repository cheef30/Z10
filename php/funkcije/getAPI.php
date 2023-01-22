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
            $result[$res] = dohvatiVestiSer($_GET['str'], $_GET['velStr']);
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
        case 'mecevi':
            $str = $_GET['str'];
            $velStr = $_GET['velStr'];
            $sortPo = $_GET['sortPo'];
            $tipMeca = $_GET['tipMeca'];

            $greska = '';
            if (!isset($str))
            {
                $greska = 'Niste prosledili stranicu!';
            }
            else if (!isset($velStr)) {
                $greska = 'Niste prosledili veličinu stranice!';
            }

            if (!empty($greska)) {
                $result[$err] = $greska;
                break;
            }

            $result[$res] = dohvatiMeceveSer($str, $velStr, $sortPo, $tipMeca);
            
            break;
        default:
            $obj = $_GET[$obj];
            $result[$err] = "Objekat $obj ne postoji!";
            break;
    }

echo json_encode($result);