<?php
namespace App\Model;

use App\Orm\Orm;

class Model
{
  protected $orm;

  function __construct()
  {
    $this->orm = Orm::getInstance();
  }
  function lastId()
  {
    return $this->orm->lastId();
  }
  function selectCount(array $data){
             return $this->orm->selectCount( $data);
  }
}