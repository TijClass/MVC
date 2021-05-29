<?php

include_once('init/init.php');
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$admin = new AdminController();
$api = new APIController();

try
    {
        
        if(empty($_GET['page']))
        {
            throw new Exception("Error 404 !! Something is wrong");
        }

        else
        {
          
            $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
          

        if(empty($url[0]) || empty($url[1])) 
        {
            throw new Exception("Page 404");
        }

        switch($url[0])
        {
            case 'admin' : 
                switch($url[1])
                {
                    case 'login' : $admin->login();
                    break;
                    case 'connexion' :$admin->connexion();
                    break;
                    case 'home' : $admin->getHome();
                    break;
                    case 'logout' : $admin->logout();
                    break;
                    default :
                        throw new Exception('error 404');
                }
                break;

               case 'visitor' : 
                switch($url[1])
                {
                    case 'animals' : $api->getAnimals();
                    break;
                    case 'animal' : 
                        if(empty($url[2]))
                        {
                            throw new Exception('identifiant manquant');
                        }
                        $api->getAnimal($url[2]);
                    break;
                    case 'continents' : $api->getContinents();
                    break;
                    case 'famillies' : $api->getFamilies();
                    break;
                    default:
                    throw new Exception('Error page visitor');
                }
            break;  
            default:
            throw new Exception('error 404');
        }
          
         
        }
    }
    catch(Exception $e)
    {
    $msg = $e->getMessage();
    echo $msg;
    } 




