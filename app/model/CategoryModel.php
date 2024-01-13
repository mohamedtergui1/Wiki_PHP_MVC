<?php

namespace App\Model;

class CategoryModel extends Model
{
  function selectCategory(int $id = null)
  {
    return $this->orm->selectAll("category", $id);
  }

  function insertCategory(array $data): bool
  {
    return $this->orm->insert("category", $data);
  }
  function updateCategory(array $data, int $id)
  {
    return $this->orm->update("category", $data, $id);
  }
  function deleteCategory(int $id)
  {
    return $this->orm->delete("category", $id);
  }
}