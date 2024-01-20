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


$username = 'test';
$password = 'test';
$email = 'test@test.com';

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

try {
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash, email) VALUES (:username, :password_hash, :email)");
    $stmt->execute(['username' => $username, 'password_hash' => $hashedPassword, 'email' => $email]);

    echo "Registration successful";
    
    return true;
} catch (PDOException $e) {
    error_log("Registration failed: " . $e->getMessage(), 3, "/logfile.log");
    return false;
}