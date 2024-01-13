<?php

namespace App\Controller;

use App\Model\TagModel;
use App\Helper\SessionHelper;
use App\Helper\Redirect;
use App\Helper\Helper;


class TagController extends Controller
{
    private $tag;

    function __construct()
    {
        parent::__construct();

        $this->tag = new TagModel;

    }


    function deleteTag(int $id)
    {
        if ($this->tag->deleteTag($id)) {

            SessionHelper::set("success", "the tag delete with success");
            Redirect::back();
            die;
        } else {


            SessionHelper::set("error", "faild");
            Redirect::back();
            die;
        }
    }
    function addtag()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->validate($_POST)=="1") {
                if ($this->tag->insertTag($_POST)) {
                    SessionHelper::set("success", "the tag added with success");
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
        else if (Helper::validateName($data["tag"]))
            return "please enter a valide name of tag";
        else
            return "1";
    }


}