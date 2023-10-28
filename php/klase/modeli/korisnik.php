<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class Korisnik implements MyJson {
    public $id;
    public $mejlAdresa;
    public $korisnickoIme;

    public function __construct($id, $mejlAdresa, $korisnickoIme) {
        $this->id = $id;
        $this->mejlAdresa = $mejlAdresa;
        $this->korisnickoIme = $korisnickoIme;
    }

    public function AsJSON(){
        return json_encode($this);
    }
}