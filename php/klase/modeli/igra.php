<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class Igra implements MyJson {
    public $id;
    public $naziv;

    public function __construct($id, $naziv)
    {
        $this->id = $id;
        $this->naziv = $naziv;
    }

    public function AsJSON(){
        return json_encode($this);
    }
}