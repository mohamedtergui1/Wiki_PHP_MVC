<?php

namespace App\Model;

class WikiModel extends Model
{
  function slelectWiki(int $id = null , array $where = [] , $operatour = "=")
  { 
   $place =["1"=>"1"];
    if($id !== null) $place = ["wiki.id" => $id];
    else if (!empty($where)) $place = $where;
    return $this->orm->innerJoinSelect(
      ["wiki", "user", "category"]
      ,
      ["wiki.id", "title", "content", "user.username", "category", "user.image as authorImage" , "wiki.image as wikiImage", "status"]
      ,
      [" wiki.userID " => "user.id ", " category.id" => "wiki.categoryID"]
      ,
      $place
      ,
      $operatour
    );
  }
  function insertWiki(array $data): bool
  {
    return $this->orm->insert("wiki", $data);
  }
  function updateWiki(array $data, int $id)
  {
    return $this->orm->update("wiki", $data, $id);
  }
  function deleteWiki(int $id)
  {
    return $this->orm->delete("wiki", $id);
  }

}