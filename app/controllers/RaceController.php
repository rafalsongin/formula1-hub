<?php
require_once __DIR__ . '/../api/ErgastAPI.php';
require_once '../config/init.php';


class RaceController
{
    private ErgastAPI $api;

    public function __construct()
    {
        $this->api = new ErgastAPI();
    }

    public function index()
    {
        $races = $this->api->getRaces();
        include '../views/RaceView.php';
    }
}