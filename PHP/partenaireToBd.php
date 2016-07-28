<?php
session_start();
require_once 'admin.php';
require_once 'partenaire.php';
$admin = new Admin();
$projet = new Projet();

  if($admin->estConnecte()==true) // si l'administrateur est deja loggé
  {





    $result = $partenaire->insertInto(post('identifiant'), post('intitule'), post('reference') ) ;

	 // echo "connected"; // message recuperé dans le scriptLogin.js avec ajax
    if($result){
      echo "Yes";
    }
  }
  



  function post($key) {
    if ($key=='conventionY') {
       if (isset($_POST[$key]))
      return $_POST[$key];
      else return 'N'; 
    }
    else if (isset($_POST[$key]))
      return $_POST[$key];
      return "valeur non saisie";
  }




  ?>