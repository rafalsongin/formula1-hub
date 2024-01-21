<?php

namespace App\Services;

require_once '../config/init.php';
require_once '../repositories/AuthRepository.php';

use App\Repositories\AuthRepository;

class AuthService
{
    private AuthRepository $auth_db;

    public function __construct()
    {
        $this->auth_db = new AuthRepository();
    }

    public function registerUser($username, $password, $email)
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $email = strtolower($email);
        $username = strtolower($username);
        
        return $this->auth_db->registerUser($username, $password_hash, $email);
    }
    
    public function authenticateUser($username, $password)
    {
        return $this->auth_db->authenticateUser($username, $password);
    }

    public function getUserId(mixed $username)
    {
        return $this->auth_db->getUserId($username);
    }
}
