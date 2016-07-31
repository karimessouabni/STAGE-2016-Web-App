<?php
session_start();
require_once 'admin.php';
require_once 'projet.php';
$admin = new Admin();
$projet = new Projet();

  if($admin->estConnecte()==true) // si l'administrateur est deja loggé
  {


    // check that all POST variables have been set
  // if(!post($_POST['method']) ) exit;
  // if(!post($_POST['value']) ) exit;
  // if(!post($_POST['target'])) exit;


   // if ($_POST['naturem'] === NULL){
   //  echo "les champs suivan …… doivent etres saisis avant l'envoi !".$_POST['naturem']; 
   //  exit ;
   // }else{
   //  echo "lmjk".$_POST['naturem'];
   // }

 //|| isset($_POST['intitule']) || isset($_POST['reference']) || isset($_POST['cout']) 
    // echo "--->".$post('conventionY')."----";

    $result = $projet->updateProjet(post('identifiant'), post('intitule'), post('reference'), post('superficie'), post('objectif'), post('consistance'), post('cout'), post('maitre'), post('naturem'), post('taux'), post('commune'), post('situation'), post('intervention'), post('naturet'), post('statut'), post('conventionYe'), post('remarques'), post('long'), post('lat'));

	 // echo "connected"; // message recuperé dans le scriptLogin.js avec ajax
    if($result){
      echo "Projet modifé avec succes !";
    } else {
      alert("Erruer");
    }
  }
  



  function post($key) {
    if ($key=='conventionYe') {
       if (isset($_POST[$key]))
      return $_POST[$key];
      else return 'N'; 
    }
    else if (isset($_POST[$key]))
      return $_POST[$key];
      return "";
  }







  ?>