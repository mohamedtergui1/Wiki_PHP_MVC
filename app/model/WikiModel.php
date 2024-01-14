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
      ["wiki.id", "title", "content", "wiki.datetime" ,  "user.username", "category" , "category.id as categoryID" , "user.image as authorImage" , "wiki.image as wikiImage", "status"]
      ,
      [" wiki.userID " => "user.id ", " category.id" => "wiki.categoryID"]
      ,
      $place
      ,
      $operatour
    );
  }
  function slelectWikiInnerTag(int $id = null , array $where = [] , $operatour = "=")
  { 
   $place =["1"=>"1"];
    if($id !== null) $place = ["wiki.id" => $id];
    else if (!empty($where)) $place = $where;
    return $this->orm->innerJoinSelect(
      ["wiki", "user", "category","tag" , "wiki_tag"]
      ,
      ["wiki.id", "title", "wiki.datetime" , "content", "user.username", "category", "user.image as authorImage" , "wiki.image as wikiImage", "status"]
      ,
      [" wiki.userID " => "user.id ", " category.id" => "wiki.categoryID" ,"wiki_tag.tagID" =>" tag.id","wiki_tag.wikiID" =>"wiki.id "]
      ,
      $place
      ,
      $operatour
    );
  }
  function insertWiki(array $data): bool
  {
    return $this->orm->insertNoProtect("wiki", $data);
  }
  function updateWiki(array $data, int $id)
  {
    return $this->orm->update("wiki", $data, $id);
  }
  function deleteWiki(int $id)
  {
    return $this->orm->delete("wiki", $id);
  }

  function selectWikiTag( int $id){
              return $this->orm->innerJoinSelect(
                ["wiki" ,"tag" , "wiki_tag"]
                ,
                [ "tag.tag" ,"tag.id as id" ]
                ,
                ["wiki.id" =>  "wiki_tag.tagID" , "tag.id" =>  "wiki_tag.wikiID"]
                ,
                [ "wiki.id" => $id]
              );
  }

    function insertWikiTag(array $data): bool
    {
       return $this->orm->insert("wiki_tag", $data);
    }
    function deleteWikiTag(int $id){
      return $this->orm->deleteWikiTag("wiki_tag",$id); 
    }

}