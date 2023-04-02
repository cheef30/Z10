<?php
include_once 'dohvatanjeBaza.php';
include_once 'dohvatanjeSer.php';
include_once 'ubacivanje.php';
include_once 'azuriranje.php';
include_once 'kljucevi.php';
include_once 'YTAPI.php';
header('Content-Type: application/json');

DEFINE('POZOVIAPINASVAKIHSATI', 2);

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
            $sortPo = null;
            $tipMeca = null;
            $idTakmicenja = null;

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

            if (isset($_GET['id_takmicenja']))
                $idTakmicenja = $_GET['id_takmicenja'];

            if (isset($_GET['sortPo']))
                $sortPo = $_GET['sortPo'];

            if (isset($_GET['tipMeca']))
                $tipMeca = $_GET['tipMeca'];
            
            $result[$res] = dohvatiMeceveSer($str, $velStr, $sortPo, $tipMeca, $idTakmicenja);
            
            break;
        case 'yt':
            $idKanala = null;

            if (!isset($_GET['str']))
            {
                $greska = 'Niste prosledili stranicu!';
            }
            else if (!isset($_GET['velStr'])) {
                $greska = 'Niste prosledili veličinu stranice!';
            }
            /*else if (!isset($idKanala)) {
                $greska = 'Niste prosledili id kanala!';
            }*/

            if (!empty($greska)) {
                $result[$err] = $greska;
                break;
            }

            $str = $_GET['str'];
            $velStr = $_GET['velStr'];

            if (isset($_GET['idKanala'])) {
                $idKanala = $_GET['idKanala'];
            }

            $poslednjiPozivAPI = dohvatiVrednostParametra('PoslednjiPozivYTAPI');

            if (pozoviAPI($poslednjiPozivAPI)) {                
                UbaciNoveVideeObaKanalaUBazu($poslednjiPozivAPI);

                azurirajParametar('PoslednjiPozivYTAPI', date('Y-m-d H:i:s'));
            }

            $ytVideos = dohvatiYTVidSer($str, $velStr, $idKanala);

            $result[$res] = $ytVideos;
            break;
        default:
            $obj = $_GET[$obj];
            $result[$err] = "Objekat $obj ne postoji!";
            break;
    }

echo json_encode($result);

function UbaciRezultatAPIPozivaUBazu($channelId, $poslednjiPozivAPI) {
    $ytVideos = array();

    $ytVideos = getVideosFromAPI($channelId, date('Y-m-d', $poslednjiPozivAPI) . 'T' . date('H:i:s', $poslednjiPozivAPI) . 'Z');

    foreach ($ytVideos as $ytVideo) {
        dodajYTVideo($ytVideo);
    }
}

function UbaciNoveVideeObaKanalaUBazu($poslednjiPozivAPI) {
    $poslednjiPozivAPITime = strtotime($poslednjiPozivAPI);

    UbaciRezultatAPIPozivaUBazu(Z10CHANNELID, $poslednjiPozivAPITime);
    UbaciRezultatAPIPozivaUBazu(Z10TVCHANNELID, $poslednjiPozivAPITime);
}

function pozoviAPI($poslednjiPozivAPI) {
    if (razlikaUSatima(time(), strtotime($poslednjiPozivAPI)) >= POZOVIAPINASVAKIHSATI)
        return true;

    return false;
}

function razlikaUSatima($ts1, $ts2) {
    return abs($ts1 - $ts2)/3600;
}