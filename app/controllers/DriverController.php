<?php

use App\Views\DriverView;

require_once __DIR__ . '/../api/ErgastAPI.php';
require_once __DIR__ . '/../views/DriverView.php';
require_once '../config/init.php';


class DriverController {
    private ErgastAPI $api;
    private DriverView $view;

    public function __construct() {
        $this->api = new ErgastAPI();
        $this->view = new DriverView();
    }

    public function index() {
        $drivers = $this->api->getDrivers();
        return $this->view->showDrivers($drivers);
    }
}