<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class Vest implements MyJson {
    public $id;
    public $naslov;
    public $putanjaSlike;
    public $datumVremeUnosa;

    public function __construct($id, $naslov, $putanjaSlike, $datumVremeUnosa)
    {
        $this->id = $id;
        $this->naslov = $naslov;
        $this->putanjaSlike = $putanjaSlike;
        $this->datumVremeUnosa = $datumVremeUnosa;
    }

    public function AsJSON(){
        return json_encode($this);
    }
}