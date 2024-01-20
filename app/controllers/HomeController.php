<?php
require_once '../config/init.php';
require_once __DIR__ . '/../views/HomeView.php';

use App\Views\HomeView;

class HomeController
{
    private HomeView $view;

    public function __construct()
    {
        $this->view = new HomeView();
    }

    public function index()
    {
        return $this->view->showHomepage();
    }
}