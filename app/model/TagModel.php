<?php

   namespace App\Model;
   
   class TagModel extends Model {
        
          function selectTag(int $id = null){
             return  $this->orm->selectAll("tag",$id);
          }


   }