<?php
namespace App\Controller;

use App\Model\CategoryModel;
use App\Helper\SessionHelper;
use App\Helper\Redirect;
use App\Helper\Helper;

class CategoryController extends Controller
{
    private $category;

    function __construct()
    {
        parent::__construct();
        $this->category = new CategoryModel;
    }
    function deleteCategory(int $id)
    {
        if ($this->category->deleteCategory($id)) {
            SessionHelper::set("success", "the Category delete with success");
            Redirect::back();

        } else {
            SessionHelper::set("error", "faild");
            Redirect::back();

        }
    }


    function addCategory()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->validate($_POST)=="1") {
                if ($this->category->insertCategory($_POST)) {
                    SessionHelper::set("success", "the Category added with success");
                    Redirect::back();
                } else {
                    SessionHelper::set("error", "faild");
                    Redirect::back();
                }
            } else{
                SessionHelper::set("error",$this->validate($_POST));
                Redirect::back();
            }
        }
    }


    private function validate(array $data): string
    {   
        if(empty($data["category"])) return"please enter  a name ";
        else  if (Helper::validateName($data["category"]))
            return "please enter a valide name of category";
        
        else
            return "1";
    }

}