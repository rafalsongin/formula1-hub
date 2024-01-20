<?php
require_once('../controllers/SwitchRouter.php');
require_once '../config/init.php';

$router = new SwitchRouter();
$router->route();