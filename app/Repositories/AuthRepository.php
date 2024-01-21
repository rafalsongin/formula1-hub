<?php
namespace App\Repositories;

require_once '../config/init.php';
require_once '../Repositories/Database.php';

use Comment;
use PDO;
use PDOException;

class AuthRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function registerUser($username, $password_hash, $email)
    {
        $sql = "INSERT INTO users (username, password_hash, email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($sql);

        try {
            if ($this->usernameOrEmailExists($username, $email)) {
                return false;
            }
            
            $stmt->execute(['username' => $username, 'password' => $password_hash, 'email' => $email]);
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function authenticateUser($username, $input_password) : bool {
        $stmt = $this->conn->prepare("SELECT id, username, password_hash FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($input_password, $user['password_hash'])) {
            return true;
        }
        return false;
    }

    public function usernameOrEmailExists(mixed $username, mixed $email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return true;
        }
        return false;
    }

    public function getUserId(mixed $username)
    {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user['id'];
        }
        return false;
    }
}
