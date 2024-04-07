<?php

require_once __DIR__ . '/../api/ErgastAPI.php';
require_once '../config/init.php';


class DriverController
{
    private ErgastAPI $api;

    public function __construct()
    {
        $this->api = new ErgastAPI();
    }

    public function index()
    {
        $drivers = $this->api->getDrivers();
        include '../views/DriverView.php';
    }
}