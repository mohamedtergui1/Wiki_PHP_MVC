<?php

 namespace App\Model;

 class WikiModel extends Model{
     function slelectWiki(int $id = null) {
       return $this->orm->selectAll("wiki",$id);
     }
     function insertWiki(array $data):bool  {
          return $this->orm->insert("wiki",$data);
     }
 } 