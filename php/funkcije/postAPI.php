<?php
include_once 'ubacivanje.php';
include_once 'kljucevi.php';

$result = array();

if( !isset($_GET[$obj]))
    $result[$err] = 'Nije prosledjen objekat koji zelite da ubacite u bazu!';

if (!isset($result[$err]))
    switch ($_GET[$obj]) {
        case 'mejl':
            if (empty($_POST['adresa'])) {
                $result[$err] = 'Niste prosledili mejl adresu!';
                break;
            }

            $mejl = $_POST['adresa'];

            if (!filter_var($mejl, FILTER_VALIDATE_EMAIL)) {
                $result[$err] = "Mejl '$mejl' nije u dobrom formatu!";
                break;
            }

            $result[$res] = dodajPretplatnika($mejl);
            break;
        default:
            $obj = $_GET[$obj];
            $result[$err] = "Objekat $obj ne postoji!";
            break;
    }

echo json_encode($result);