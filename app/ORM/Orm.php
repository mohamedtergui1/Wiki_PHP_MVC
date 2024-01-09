<?php
namespace App\Orm;

use PDOException;
use PDO;
use App\DataBase\DataBase;

class Orm
{
    private $db_database_connect;
    private static $instance;
    private function __construct()
    {
        $this->db_database_connect =  DataBase::getInstance()->getPdo();;
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function selectAll(string $table, int $id = null )
    {

        if ($id !== null) {
            $id += 0;
            $where = "WHERE  id =:id";
        } else
            $where = "";
        try {

            $stmt = $this->db_database_connect->prepare("SELECT * FROM {$table} {$where}");
            if ($id !== null)
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($id !== null)
                return $stmt->fetch(PDO::FETCH_OBJ);
            else
                return $stmt->fetchAll(PDO::FETCH_OBJ);


        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();

            return false;
        }
    }
    public function selectWhereColumns(string $table, array $where )
{
    try {
        $placeWhere = implode(" AND ", array_map(function ($k, $v) {
            return "$k = :$k";
        }, array_keys($where), $where));

        $stmt = $this->db_database_connect->prepare("SELECT * FROM {$table} WHERE {$placeWhere}");

        foreach ($where as $key => $val) {
            $type = gettype($val);
            switch ($type) {
                case "integer":
                    $stmt->bindValue(":$key", $val, PDO::PARAM_INT);
                    break;

                case "boolean":
                    $stmt->bindValue(":$key", $val, PDO::PARAM_BOOL);
                    break;

                default:
                    $stmt->bindValue(":$key", $val, PDO::PARAM_STR);
            }
        }

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


    public function insert(string $table, array $data)
    {
        $placeValues = ":" . implode(",:", array_keys($data));
        $columnNames = implode(",", array_keys($data));

        try {
            $stmt = $this->db_database_connect->prepare("INSERT INTO {$table} ({$columnNames}) VALUES ({$placeValues})");

            foreach ($data as $key => $val) {
                
                $type = gettype($val);
                switch ($type) {
                    case "integer":
                        $stmt->bindValue(":$key", $val, PDO::PARAM_INT);
                        break;

                    case "boolean":
                        $stmt->bindValue(":$key", $val, PDO::PARAM_BOOL);
                        break;

                    default:
                        $stmt->bindValue(":$key", $val, PDO::PARAM_STR);
                }
            }

            $stmt = $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function update(string $table, array $data, int $id)
    {
        $placeColumnsValues = implode(", ", array_map(function ($key, $value) {
            return " $key = :$key ";
        }, array_keys($data), $data));

        try {
            $stmt = $this->db_database_connect->prepare("UPDATE {$table} SET {$placeColumnsValues} WHERE id = :id");

            foreach ($data as $key => $val) {
                
                $type = gettype($val);
                switch ($type) {
                    case "integer":
                        $val+=0;
                        $stmt->bindValue(":$key", $val, PDO::PARAM_INT);
                        break;

                    case "boolean":
                        $stmt->bindValue(":$key", $val, PDO::PARAM_INT);
                        break;

                    default:
                        $val = $this->protectXSS($val);
                        $stmt->bindValue(":$key", $val, PDO::PARAM_STR);
                }
            }
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $success = $stmt->execute();
            return $success;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete(string $table, int $id)
    {
        try {

            $stmt = $this->db_database_connect->prepare("DELETE FROM {$table} WHERE  id =:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;

        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    public function find(string $table, array $columns, array $inputSearch)
    {
        $columns = implode(",", $columns);
        $placeSearchCondition = implode("AND", array_map(function ($key, $value) {
            return "$key LIKE '%:$key%'";
        }, array_keys($inputSearch), $inputSearch));
        try {

            $stmt = $this->db_database_connect->prepare("SELECT  {$columns} FROM {$table} WHERE LIKE {$placeSearchCondition}");

            foreach ($inputSearch as $key => $value) {

                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);

            }

            $stmt->execute();

            return $stmt;

        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();

            return false;
        }
    }
    public function innerJoinSelect(string $tables, array $COLUMNS, array $condition, array $where)
    {
        $tables = implode(" INNER JOIN ", $tables);
        $condition = implode(" AND ", array_map(function ($key, $value) {
            return "$key = $value";
        }, array_keys($condition), $condition));
        $where = implode(" AND ", array_map(function ($key, $value) {
            return "$key=$value";
        }, array_keys($where), $where));
        $COLUMNS = implode(",", $COLUMNS);

        $stmt = $this->db_database_connect->prepare("SELECT {$COLUMNS}  FROM {$tables} ON {$condition} WHERE  {$where}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    function protectXSS($input) {
        
        $input = trim($input);
        
        $input = addslashes($input);

        $input = trim($input);
        
        
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    
        return $input;
    }
    

}
