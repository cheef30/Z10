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
                $result[$err] = 'You didn\'t enter your email address!';
                break;
            }

            $mejl = $_POST['adresa'];

            if (!filter_var($mejl, FILTER_VALIDATE_EMAIL)) {
                $result[$err] = "Mail address '$mejl' is not in mail format!";
                break;
            }

            dodajPretplatnika($mejl);
            $result[$res] = 'You subscribed to newsletter!';
            break;
        default:
            $obj = $_GET[$obj];
            $result[$err] = "Objekat $obj ne postoji!";
            break;
    }

echo json_encode($result);