<?php
namespace App\Repositories;

require_once '../config/init.php';
require_once '../config/dbconfig.php';
require_once '../models/Comment.php';

use Comment;
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

    public function getConnection()
    {
        return $this->conn;
    }
}
