<?php

require_once '../config/dbconfig.php';

$type = DB_TYPE;
$host = DB_SERVER;
$db_name = DB_NAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;

$conn = null;

try {
    $dsn = "{$type}:host={$host};dbname={$db_name}";
    $conn = new PDO($dsn, $username, $password);
    $conn->exec("set names utf8");

    echo "Connected successfully";
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

echo "<br>";
echo "<br>";
echo "<br>";

$password = "test2";
$password_hash = "";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $password_hash)) {
    echo "Password matches";
} else {
    echo "Password does not match";
}

