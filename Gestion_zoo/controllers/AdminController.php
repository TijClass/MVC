<?php


include 'models/Admin.php';
include_once 'helper_classes/Validator.php';


class AdminController
{ 

  private $admin;

  public function __construct()
  {
      $this->admin = new Admin();
  }


  public function login()
  {
    require_once 'views/login_sys/login.view.php';
  }

  public function connexion()
  {   
      

     if(isset($_POST['send']) && !empty($_POST['send']))
     {    
          // $validator = new Validator();
      $data = array();
      $data['username'] =  Validator::sanitizeForms($_POST['username']);
      $data['password'] =  Validator::sanitizeForms($_POST['pass']);
      $fields = array('username', 'password');

      $validate_email = Validator::isValidEmail($data['username'], $this->admin->getUser($data['username'])->email);
      $validate_password = Validator::passwordsMatch(md5($data['password']), $this->admin->getUser($data['username'])->password);
      

      if(empty($data['username']) && empty($data['password']))
      {
        createSession('alert', 'alert-danger alert-dismissible', 'fields are required');
        redirect(URL . 'admin/login', 'success', '', '');



      }

      else
      {
        if (!$validate_email) {

          createSession('alert', 'alert-danger alert-dismissible', 'username is wrong');
          redirect(URL . 'admin/login', 'success', '', '');
        }

        if (!$validate_password) {

          createSession('alert', 'alert-danger alert-dismissible', 'password is wrong');
          redirect(URL . 'admin/login', 'success', '', '');
        }

        if($validate_email && $validate_password)
        {  
          $user = $this->admin->getUser($data['username'])->name;

          redirect(URL . 'admin/home', 'user',$user,'');
               
        }

      }

         
  }

}


  public function getHome()
  {

    if(isLoggedIn('user')) {

      require_once "views/admin/welcome.view.php";

    } 
    else 
    {
      createSession('alert', 'alert-success alert-dismissible', 'you should log in');
      redirect(URL . 'admin/login', 'log_in', '', '');
    }
  }


  public function logout()
  {

    if(isset($_POST['logout'])) {

       
        unset($_SESSION['user']);
        createSession('alert','alert-success alert-dismissible','you are logged out');
        redirect(URL.'admin/login','','','');
    }
  }




}