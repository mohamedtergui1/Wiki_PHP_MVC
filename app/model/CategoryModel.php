<?php 

    namespace App\Model;
    class CategoryModel extends  Model{
        function selectCategory(int $id = null){
          return  $this->orm->selectAll("category" , $id );
        }
    } 