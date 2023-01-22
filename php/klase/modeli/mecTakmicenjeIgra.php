<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class MecTakmicenjeIgra implements MyJson {
    public $mec;
    public $nazivTakmicenja;
    public $nazivIgre;

    public function __construct($mec, $nazivTakmicenja, $nazivIgre)
    {
        $this->mec = $mec;
        $this->nazivTakmicenja = $nazivTakmicenja;
        $this->nazivIgre = $nazivIgre;
    }

    public function AsJSON()
    {
        return json_encode($this);
    }
}