<?php 
namespace App\Controller;
use App\Model\WikiModel;
class WikiController extends Controller {
        private $wiki;

        function __construct(){
            parent::__construct();
           $this->wiki = new WikiModel ;
        }
      function changeStatus( int $id, string $newstatus){
                 if($this->admin){
             if($this->wiki->updateWiki( ["status" => $newstatus],$id )) {
             header("location:".APP_URL."dashboard/managewiki");
             die;
            }
             else "faled";
        }
      }
      function deleteWiki(int $id){
        if($this->wiki->deleteWiki( $id )){
        header("location:".APP_URL."dashboard/managewiki");
            die;
    }
        else "faled";
      }

}