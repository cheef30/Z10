<?php
include_once dirname(__DIR__) . '/../interfejsi/json.php';

class YTVideo implements MyJson {
    public $id;
    public $dateTime;
    public $channelId;

    public function __construct($id, $dateTime, $channelId)
    {
        $this->id = $id;
        $this->dateTime = $dateTime;
        $this->channelId = $channelId;
    }

    public function AsJSON()
    {
        return json_encode($this);
    }
}