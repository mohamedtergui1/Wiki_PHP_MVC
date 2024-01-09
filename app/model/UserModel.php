<?php

namespace App\Model;

class UserModel extends Model
{
  private static $instance;
  function insertUser(array $data)
  {
    return $this->orm->insert("user", $data);
  }
  public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


  function selectByEmail(string $email)
  {
    return $this->orm->selectWhereColumns("user", ["email" => $email]);
  }
  function selectUser($id=null){
    return $this->orm->selectAll("user", $id );
  }

}