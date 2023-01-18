<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class TimRezultat implements MyJson {
    public $id;
    public $tim;
    public $rezultat;

    public function __construct($id, $tim, $rezultat)
    {
        $this->id = $id;
        $this->tim = $tim;
        $this->rezultat = $rezultat;
    }

    public function AsJSON()
    {
        return json_encode($this);
    }
}