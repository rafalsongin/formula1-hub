<?php
require_once '../config/init.php';
require_once __DIR__ . '/../views/HomeView.php';

class HomeController
{
    public function __construct()
    {
        include_once '../views/HomeView.php';
    }
}