<?php 
  
   namespace App\Model;

   class WikiTagModel extends Model{
         function insert(array $data) : bool{
           

            return $this->orm->insert("wiki_tag",$data);

         }
   }