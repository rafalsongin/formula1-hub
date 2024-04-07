<?php
require_once __DIR__ . '/../api/ErgastAPI.php';
require_once '../config/init.php';


class ConstructorController
{
    private ErgastAPI $api;

    public function __construct()
    {
        $this->api = new ErgastAPI();
    }

    public function index()
    {
        $constructors = $this->api->getConstructors();
        include '../views/ConstructorView.php';
    }
}