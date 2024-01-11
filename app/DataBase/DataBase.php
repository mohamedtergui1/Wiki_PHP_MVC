<?php

namespace App\DataBase;

use PDO;
use PDOException;

class DataBase
{
    private static $instance;
    private $pdo;

    private function __construct($db_name = DB_NAME, $db_host = DB_HOST, $db_user = DB_USER, $db_pass = DB_PASS)
    {
        try {
            $this->pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

  

    public function __destruct()
    {
        $this->pdo = null;
    }
    public function logError(PDOException $e)
    {
        $logFilePath = dirname(__DIR__ . '../') . '\logs\error.log';
        $errorMessage = "[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n";
        file_put_contents($logFilePath, $errorMessage, FILE_APPEND);
    }

    public function logQuery($query)
    {
        $logFilePath = dirname(__DIR__ . '../') . '\logs\query.log';

        $logMessage = "[" . date('Y-m-d H:i:s') . "] " .  $query . "\n";
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }
}

