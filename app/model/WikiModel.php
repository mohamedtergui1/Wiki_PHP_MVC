<?php

namespace App\Model;

class WikiModel extends Model
{
  function slelectWiki(int $id = null)
  {
    return $this->orm->innerJoinSelect(
      ["wiki", "user", "category"]
      ,
      ["wiki.id", "title", "content", "user.username", "category", "image", "status"]
      ,
      [" wiki.userID " => "user.id ", " category.id" => "wiki.categoryID"]

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