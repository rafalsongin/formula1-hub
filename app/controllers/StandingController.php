<?php
require_once __DIR__ . '/../api/ErgastAPI.php';
require_once '../config/init.php';


class StandingController
{
    private ErgastAPI $api;

    public function __construct()
    {
        $this->api = new ErgastAPI();
    }

    public function index()
    {
        $driverStandings = $this->api->getDriverStandings();
        $constructorStandings = $this->api->getConstructorStandings();

        include '../views/StandingView.php';
    }
}