<?php   
  namespace App\Controller;
  use App\Model\UserModel;
  use App\Helper\SessionHelper;
  use App\Helper\Redirect;
  class UserController extends Controller{

    private $user ; 

    function __construct(){
        parent::__construct();
        $this->user = new UserModel;
    }

    function delete(int $id){
         if($this->user->deleteUser($id)){
           SessionHelper::set("success","the user delete with success");
           Redirect::back();
         }else{

         
            SessionHelper::set("error","faild");
            Redirect::back();
              die;
          }
    }


  }