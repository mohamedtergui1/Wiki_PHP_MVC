<?php
  namespace App\Controller;
  use App\Model\CategoryModel;
  use App\Model\TagModel;
  use App\Model\WikiModel;
  use App\Model\WikiTagModel;
  use App\Helper\Helper;
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
         
          if(isset($_POST["image"])) unset($_POST["image"]);
           
          $image = ["image" => $_FILES["image"]["name"]];
          if(!empty($image["image"])) $_POST += $image;
         
         if($this->validate($_POST) == "1"){
          if(isset($_POST["tagId"])){
             $tags = $_POST["tagId"];
             unset($_POST["tagId"]);
          }else $tags= [];
          $_POST += array("userID"=> $this->idFromSession);
          if($this->wiki->insertWiki($_POST)){
               
                $image_tmp = $_FILES["image"]["tmp_name"];
               $this->move_upload($image_tmp,$_FILES["image"]["name"]);
               
               $id_wiki = $this->wiki->lastId();
               if($id_wiki){
                    foreach($tags as $t ){
                          $this->wikiTag->insert(["wikiID" => $id_wiki, "tagID" => $t]);
                    }
                    echo "1";
               }else echo "not fount last id inserdet";
          } else echo " error insert wiki";
           

        }else echo $this->validate($_POST);
      }
    }
     
    function validate(array $data){
          if(strlen(trim($data['title']))<4) return "yout title so short";
          else if (strlen(trim($data['content']))<30) return "your content is short enter olud then 30 char"; 
                
          else if(Helper::validateName($data["title"])) return "you title npt valide";

          else if(Helper::validateString($data["content"])) return "your wiki must be text";
          else if(empty($data["categoryID"]))  return "chose a category please";
          else if (isset($data["image"])) {
            
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp' ];
                if (!in_array($_FILES["image"]["type"], $allowedTypes)) 
                   return "Your file  is not valid.<br>";
                
            else return "1";
        }

          else return "1";
          
    }
    function move_upload($file, string $fileName, string $path = './asset/wikisImage/')
    {
        return move_uploaded_file($file, $path . $fileName);
    }
   
  }