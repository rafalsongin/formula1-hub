<?php

require_once '../api/ErgastAPI.php';

$api = new ErgastAPI();
$constructors = $api->getDrivers();

header('Content-Type: application/json');
echo json_encode($constructors);
