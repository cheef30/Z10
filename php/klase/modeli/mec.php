<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class Mec implements MyJson {
    public $id;
    public $timoviRezultati;
    public $datum;
    public $vreme;

    public function __construct($id, $timoviRezultati, $datum, $vreme)
    {
        $this->id = $id;
        $this->timoviRezultati = $timoviRezultati;
        $this->datum = $datum;
        $this->vreme = $vreme;
    }

    public function AsJSON()
    {
        return json_encode($this);
    }
}