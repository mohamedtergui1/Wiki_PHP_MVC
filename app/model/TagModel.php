<?php

namespace App\Model;

class TagModel extends Model
{

   function selectTag(int $id = null)
   {
      return $this->orm->selectAll("tag", $id);
   }

   function insertWiki(array $data): bool
   {
      return $this->orm->insert("tag", $data);
   }
   function updateWiki(array $data, int $id)
   {
      return $this->orm->update("tag", $data, $id);
   }
   function deleteWiki(int $id)
   {
      return $this->orm->delete("tag", $id);
   }


}