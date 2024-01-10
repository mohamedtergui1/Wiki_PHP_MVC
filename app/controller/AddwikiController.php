<?php
  namespace App\Controller;
  use App\Model\CategoryModel;
  use App\Model\TagModel;
  use App\Model\WikiModel;
  use App\Model\WikiTagModel;
  use App\Hepler\Helper;
  class AddwikiController extends Controller{
      private $category ;
      private $tag ;
      private $wiki;
      private  $wikiTag ;
      public function __construct(){
        parent::__construct();
        $this->category = new CategoryModel;
        $this->tag = new TagModel;
        $this->wiki = new WikiModel;
        $this->wikiTag =  new WikiTagModel; 
      }
      function index(){
          if($this->idFromSession){
             $this->render("user","addWiki","Add Wi.Ki" , ["category" => $this->category->selectCategory() , "tag" => $this->tag->selectTag()] );
          }else {
            header("Location:". APP_URL);
          }
      }
      function insert(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          
         if($this->validate($_POST) == "1"){
          if($_POST["tagId"]){
             $tags = $_POST["tagId"];
             unset($_POST["tagId"]);
          }
          $_POST += array("userID"=> $this->idFromSession);
          if($this->wiki->insertWiki($_POST)){
               $id_wiki = $this->wiki->lastId();
               if($id_wiki){
                    foreach($tags as $t ){
                          $this->wikiTag->insert(["wikiID" => $id_wiki, "tagID" => $t]);
                    }
                    echo "inserted success";
               }else echo "not fount last id inserdet";
          } else echo " error insert wiki";
           

        }else echo $this->validate($_POST);
      }
    }
     
    function validate(array $data){
         
          if(Helper::validateName($data["title"])) return "you title npt valide";
               
          else if(strlen(trim($data['title']))<4) return "yout title so short";

          else if(Helper::validateString($data["content"])) return "your wiki must be text";

          else if (strlen(trim($data['content']))) return "your content is short enter olud then 30 char"; 

          else return "1";
          
    }
  }