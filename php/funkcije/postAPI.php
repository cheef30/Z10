<?php
include_once 'ubacivanje.php';
include_once 'kljucevi.php';
include_once 'pomocneFunkcije.php';
include_once 'dohvatanjeSer.php';

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
                $result[$err] = "Mail address '$mejl' is not in correct mail format!";
                break;
            }

            dodajPretplatnika($mejl);
            $result[$res] = 'You subscribed to newsletter!';
            break;
        case 'register':
            if (empty($_POST['mejl-adresa'])) {
                $result[$err] = 'You didn\'t enter your email address!';
                break;
            }

            $mejl = $_POST['mejl-adresa'];

            if (!filter_var($mejl, FILTER_VALIDATE_EMAIL)) {
                $result[$err] = "Mail address '$mejl' is not in correct mail format!";
                break;
            }

            if (empty($_POST['korisnicko-ime'])) {
                $result[$err] = 'You didn\'t enter a username!';
                break;
            }

            $korIme = $_POST['korisnicko-ime'];

            if (empty($_POST['lozinka'])) {
                $result[$err] = 'You didn\'t enter a password!';
                break;
            }

            $lozinka = $_POST['lozinka'];

            $postoji = proveriPostojanjeKorisnika($mejl, $korIme);

            if (is_string($postoji))
            {
                $result[$err] = $postoji;
                break;
            }

            if ($postoji) {
                $result[$err] = 'Entered username or e-mail address already exists!';
                break;
            }

            registrujKorisnika($mejl, $korIme, $lozinka);

            $result[$res] = 'You registered successfully!';

            break;
        case 'login':
            if (empty($_POST['korisnicko-ime'])) {
                $result[$err] = 'You didn\'t enter a username!';
                break;
            }

            $korIme = $_POST['korisnicko-ime'];

            if (empty($_POST['lozinka'])) {
                $result[$err] = 'You didn\'t enter a password!';
                break;
            }

            $lozinka = $_POST['lozinka'];

            $korisnik = dohvatiKorisnikaSer($korIme, $lozinka);

            if (is_string($korisnik)) {
                $result[$err] = $korisnik;
                break;
            }

            $result[$res] = $korisnik;
            
            break;
        default:
            $obj = $_GET[$obj];
            $result[$err] = "Objekat $obj ne postoji!";
            break;
    }

echo json_encode($result);