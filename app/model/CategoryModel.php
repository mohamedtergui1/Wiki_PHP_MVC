<?php

namespace App\Model;

class CategoryModel extends Model
{
  function selectCategory(int $id = null)
  {
    return $this->orm->selectAll("category", $id);
  }

  function insertWiki(array $data): bool
  {
    return $this->orm->insert("category", $data);
  }
  function updateWiki(array $data, int $id)
  {
    return $this->orm->update("category", $data, $id);
  }
  function deleteWiki(int $id)
  {
    return $this->orm->delete("category", $id);
  }
}