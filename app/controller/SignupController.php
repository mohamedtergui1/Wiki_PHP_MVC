<?php
namespace App\Controller;

use App\Model\UserModel;

class SignupController extends Controller
{

    private $user;
    function __construct()
    {
        $this->user =  UserModel::getInstance();
    }
    function index()
    {
        $this->render("user", "signUp", "Sign Up");
    }
    function registre()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = $_POST;

            if(isset($data["image"])) unset($data["image"]);
           
            $image = ["image" => $_FILES["image"]["name"]];
            if(!empty($image["image"])) $data += $image;
           
            
           






            if ($this->validate($data) == "1") {
                $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                if ($this->user->insertUser($data)) {
                    
                        $image_tmp = $_FILES["image"]["tmp_name"];
                        $this->move_upload($image_tmp,$_FILES["image"]["name"]);
                        if(!isset($_POST["roleID"]))
                        $_SESSION["authorID"] = $this->user->selectByEmail($data["email"])->id;
                        echo 1;
                        exit;



                } else
                    echo 0;

            } else
                echo $this->validate($data);




        }

    }
    function validate($data)
    {
        $status = true;
        $message = "";
        if (empty(trim($data["email"])) || empty(trim($data["username"])) || empty(trim($data["password"]))) {
            $status = false;
            $message = "enter all of your data";

        } else {
            if (isset($data["email"])) {

                if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
                    $status = false;
                    $message .= "Your email is not valid.<br>";

                }
                if ($this->user->selectByEmail($data["email"])) {
                    $status = false;

                    $message .= "This email is allredy exist valid.<br>";
                }

            } 

            if (isset($data["username"])) {
                if (!preg_match('/^[a-zA-Z-\s]+$/', $data["username"])) {
                    $status = false;
                    $message .= "Your username is not valid.<br>";
                }
            }
            if (isset($data["image"])) {
                if ($data["image"] !== "") {
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp' , ""];
                    if (!in_array($_FILES["image"]["type"], $allowedTypes)) {
                        $status = false;
                        $message .= "Your file  is not valid.<br>";
                    }
                }
            }
        }
        if ($status) {
            return "1";
        } else {
            return $message;
        }
    }
    function move_upload($file, string $fileName, string $path = './asset/usersImage/')
    {
        return move_uploaded_file($file, $path . $fileName);
    }
   
}