<?php
require_once '../config/init.php';
require_once '../database/Database.php';

use App\Repositories\Database;


class LoginService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function authenticateUser($username, $password) {
        
        return $this->db->authenticateUser($username, $password);
    }

    public function registerUser($username, $password, $email) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $this->db->registerUser($username, $hashedPassword, $email);
    }
}
