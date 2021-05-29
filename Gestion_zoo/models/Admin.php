<?php


class Admin extends Database
{

   
    public function getUsers()
    {

        $this->query("SELECT * from `users`");
         $data =  $this->resultset();
         return $data;
    }


    public function getUser($email)
    {
        $this->query("SELECT email,name,adresse,password,visible_password,bio,is_admin from `users` WHERE email = :email");
        $this->bind(":email",$email);
        $data = $this->single();
        return $data;

    }

    public function getPassword($email)
    {
       
         $this->query("SELECT password,visible_password FROM `users` WHERE email = :email");
         $this->bind(":email",$email);
         $data = $this->single();
         return $data;

    }


}