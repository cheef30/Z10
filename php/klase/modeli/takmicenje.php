<?php
include_once 'igra.php';
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class Takmicenje implements MyJson {
    public $id;
    public $igra;
    public $naziv;
    public $mecevi;

    public function __construct($id, $igra, $naziv, $mecevi)
    {
        $this->id = $id;
        $this->igra = $igra;
        $this->naziv = $naziv;
        $this->mecevi = $mecevi;
    }

    public function AsJSON(){
        return json_encode($this);
    }
}