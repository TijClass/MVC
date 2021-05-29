<?php 

class Validator
{  


    public static function isRequired($field_array)
    {
        foreach ($field_array as $field) {
            if ($_POST['' . $field . ''] == '') {
                return false;
            }
        }
        return true;
    }


    public static function formatJson($vars)
    {
      $tab = array();
      foreach($vars as $var)
      { 
          if(!array_key_exists($var['animal_id'],$tab))
          {
                $tab[$var['animal_id']] = [

                    "id" => $var["animal_id"],
                    "name" => $var["animal_nom"],
                    "description" => $var["animal_description"],
                    "image" => $var["animal_image"],
                    "famillies" => [
                        "id" => $var["famille_id"],
                        "name" => $var["famille_libelle"],
                        "description" => $var["famille_description"]
                    ]
                ];
          }  
          $tab[$var['animal_id']]["continents"][] = [
            
            "id" => $var["continent_id"],
            "name" => $var["continent_libelle"]

          ];
      }

      return self::sendJSON($tab);
    }

    public static function sendJSON($vars)
    {
        if(empty($vars))
        {
            $message = "No data";
            return $message;
        }
        else

        {   
            header("Access-Control-Allow-Origin: *");//API REST //application dedier
            header("Content-Type: application/json");//accept JSON DATA
            return json_encode($vars);
        }
    }
   
    public static function isValidEmail($email,$email2)
    {    
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email === $email2)  
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public static function passwordsMatch($pw1, $pw2)
    {
        if ($pw1 === $pw2) {
            return true;
        } else {
            return false;
        }
    }

    public static function sanitizeForms($inputText)
    {
        
            $inputText = trim(strip_tags($inputText));
            return $inputText;
    }
}
