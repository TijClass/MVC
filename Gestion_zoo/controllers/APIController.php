<?php 
include 'models/API/API.php';

class APIController 
{    
    private $api;
    public function __construct()
    {
        $this->api = new API();
        
    }

    public function getAnimals()
    {
         $animals = Validator::formatJson($this->api->getAllAnimals());
        echo $animals;
    }

    public function getAnimal($id)
    {
          $animal = Validator::formatJson($this->api->getAnimalID($id));
          echo($animal);

    }

    public function getContinents()
    {
          $continents = Validator::sendJSON($this->api->getBddContinents()); 
          echo($continents);
    }

    public function getFamilies()
    {
        $families = Validator::sendJSON($this->api->getBddFamilies());
        echo($families);

    }

}


