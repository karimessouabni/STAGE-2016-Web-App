<?php
session_start();
  require_once 'admin.php';
  $admin = new Admin();

  if($admin->estConnecte()==true) // si l'administrateur est deja loggé
  {
    header("Location: home.php");
  }

  if(isset($_POST['connexion']))
  {
    $email = trim($_POST['email']);
    $mp = trim($_POST['mp']);
    
    if($admin->login($email,$mp))
    {
      echo "connected"; // message recuperé dans le scriptLogin.js avec ajax
   
    }

  }

?>