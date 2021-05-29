
<?php  

class API  extends Database
{

    public function getAllAnimals()
    {
        $this->query('SELECT * from animal
          INNER JOIN famille on famille.famille_id = animal.famille_id
          INNER JOIN animal_continent on animal_continent.animal_id = animal.animal_id 
          INNER JOIN continent on continent.continent_id = animal_continent.continent_id
        ');
        $data = $this->resultset();
        return $data;
    }

   public function getAnimalID($id)
   {
       $this->query('SELECT * from animal
         
        INNER JOIN famille on famille.famille_id = animal.famille_id
        INNER JOIN animal_continent on animal_continent.animal_id = animal.animal_id 
        INNER JOIN continent on continent.continent_id = animal_continent.continent_id
        WHERE animal.animal_id = :id
           ');
       $this->bind(":id",$id);
       return $this->resultset();
   }

   public function getBddFamilies()
   {
        $this->query('SELECT * from famille');
        return $this->resultset();
   }

   public function getBddContinents()
   {
        $this->query('SELECT * from continent');
        return $this->resultset();
       
   }

}