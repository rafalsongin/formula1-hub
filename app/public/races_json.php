<?php

require_once '../api/ErgastAPI.php';

$api = new ErgastAPI();
$races = $api->getRaces();

header('Content-Type: application/json');
echo json_encode($races);
