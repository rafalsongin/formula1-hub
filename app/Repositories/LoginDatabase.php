<?php

namespace App\Repositories;

use PDO;
use PDOException;

require_once '../config/init.php';
require_once '../Repositories/Database.php';

class LoginDatabase
{
    private ?PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function registerUser($username, $password, $email)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $this->db->prepare("INSERT INTO users (username, password_hash, email) VALUES (:username, :password_hash, :email)");
            $stmt->execute(['username' => $username, 'password_hash' => $hashedPassword, 'email' => $email]);

            return true;
        } catch (PDOException $e) {
            error_log("Registration failed: " . $e->getMessage(), 3, "/logfile.log");
            return false;
        }
    }

    public function authenticateUser($username, $password) {
        $stmt = $this->db->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }
}
