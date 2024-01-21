<?php
require_once '../config/init.php';
require_once '../Repositories/Database.php';

use App\Repositories\Database;


class LoginService {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function authenticateUser($username, $input_password) : bool {
        
        return $this->db->authenticateUser($username, $input_password);
    }

    public function registerUser($username, $password, $email) : bool{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        return $this->db->registerUser($username, $hashedPassword, $email);
    }

    public function getUserId(mixed $username)
    {
        return $this->db->getUserId($username);
    }
}
