<?php
require_once __DIR__ . '/../api/ErgastAPI.php';
require_once __DIR__ . '/../views/RaceView.php';
require_once '../config/init.php';

use App\Views\RaceView;

class RaceController {
    private ErgastAPI $api;
    private RaceView $view;

    public function __construct() {
        $this->api = new ErgastAPI();
        $this->view = new RaceView();
    }

    public function index() {
        $races = $this->api->getRaces();
        return $this->view->showRaces($races);
    }
}