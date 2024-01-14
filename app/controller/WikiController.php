<?php
namespace App\Controller;

use App\Model\WikiModel;
use App\Helper\SessionHelper;
use App\Helper\Redirect;

class WikiController extends Controller
{
  private $wiki;

  function __construct()
  {
    parent::__construct();
    $this->wiki = new WikiModel;
  }
  function changeStatus(int $id, string $newstatus)
  {
    if ($this->admin) {
      if ($this->wiki->updateWiki(["status" => $newstatus], $id)) {
        SessionHelper::set("success", " success proccess");
        Redirect::back();
        die;
      } else
        "faled";
    }
  }
  function deleteWiki(int $id)
  {
    if ($this->wiki->deleteWiki($id)) {

      SessionHelper::set("success", "the wiki delete with success");
      Redirect::back();
      die;
    } else {


      SessionHelper::set("error", "faild");
      Redirect::back();
      die;
    }
  }
  function findbytitle(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
         $a=[];
         $search = $_POST["search"];
         foreach  ($this->wiki->slelectWiki(null,["wiki.title  " => "'%$search%'  AND status = 'accepted' " ], "LIKE") as $w){
                array_push($a,$w);

         }
         echo json_encode($a);
    }
  }
  function findbycategory(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
         $a=[];
         $search = $_POST["search"];
         $category = $_POST["tagCategory"];
         $category+=0;
         foreach  ($this->wiki->slelectWiki(null,["wiki.title  " => "'%$search%' AND category.id =  {$category} AND status = 'accepted' " ], "LIKE") as $w){
                array_push($a,$w);

         }
         echo json_encode($a);
    }
  }

  function findbytag(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
         $a=[];
         $search = $_POST["search"];
         $tag = $_POST["tagCategory"];
         $tag+=0;
         foreach  ($this->wiki->slelectWikiInnerTag(null,["wiki.title  " => "'%$search%' AND tag.id =  {$tag} AND status = 'accepted' " ], "LIKE") as $w){
                array_push($a,$w);

         }
         echo json_encode($a);
    }
  }
  function veiw( int $id  ){
   
    $this->render("user","wiki","wi.ki", [ "wiki" =>  $this ->wiki->slelectWiki($id) , "tags" => $this ->wiki->selectWikiTag($id) ] );

  }




}