<?php
namespace App\Repositories;

require_once '../config/init.php';
require_once '../config/dbconfig.php';

use PDO;
use PDOException;


class Database
{
    private static $instance = null;
    private $type = DB_TYPE;
    private $host = DB_SERVER;
    private $db_name = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $conn;

    private function __construct()
    {
        $this->conn = null;

        try {
            $dsn = "{$this->type}:host={$this->host};dbname={$this->db_name}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            error_log("Connection error: " . $exception->getMessage(), 3, "/logfile.log");
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function registerUser($username, $password_hash, $email)
    {
        $sql = "INSERT INTO users (username, password_hash, email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($sql);
        
        try {
            /*$stmt = $this->conn->prepare("INSERT INTO users (username, password_hash, email) VALUES (:username, :password_hash, :email)");
            $stmt->execute(['username' => $username, 'password_hash' => $password_hash, 'email' => $email]);*/

            $stmt->execute(['username' => $username, 'password' => $password_hash, 'email' => $email]);
            echo "<p>Registration successful. You can now <a href='/login'>login</a>.</p>";
            
            return true;
        } catch (PDOException $e) {
//            error_log("Registration failed: " . $e->getMessage(), 3, "/logfile.log");
            return false;
        }
    }

    public function authenticateUser($username, $password) : bool {
        $stmt = $this->conn->prepare("SELECT id, username, password_hash FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        }
        return false;
    }
}
