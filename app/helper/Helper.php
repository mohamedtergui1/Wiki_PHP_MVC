<?php
   namespace App\Hepler;

   class Helper{
    public static function validateString($input)
    {
        
        return !is_string($input) && !empty($input);
    }

    public static function validateInteger($input)
    {
        
        return !filter_var($input, FILTER_VALIDATE_INT) !== false;
    }

    public static function validateEmail($input)
    {
        
        return !filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validateAlphaNumeric($input)
    {
        
        return !ctype_alnum($input);
    }
   public static function validateName($input){
        return !preg_match('/^[a-zA-Z-\s]+$/', $input);
   }
   
   }