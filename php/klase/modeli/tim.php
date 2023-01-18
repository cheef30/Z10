<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class Tim implements MyJson {
    public $id;
    public $naziv;
    public $logo;

    public function __construct($id, $naziv, $logo)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->logo = $logo;
    }

    public function AsJSON(){
        return json_encode($this);
    }
}