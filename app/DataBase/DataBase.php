<?php

namespace App\DataBase;

use PDOException;
use PDO;

class DataBase
{
    private $pdo;

    public function __construct($db_name = DB_NAME, $db_host = DB_HOST, $db_user = DB_USER, $db_pass = DB_PASS)
    {
        try {
            $this->pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
        }
    }
    function getPdo(){
        return $this->pdo;
    }
    public function __destruct()
    {
        $this->pdo = null;
    }

}