<?php
session_start();
ob_start();

require_once 'admin.php';
$admin = new Admin();


if (isset($_POST['mobile'])) {

    if (isset($_POST['email']) && isset($_POST['mp'])) {
        $email = trim($_POST['email']);
        $mp = trim($_POST['mp']);
        ob_end_clean();
        if ($admin->loginMobile($email, $mp)) {
            echo '[{"conx":"connected"}]';
        } else echo '[{"conx":"refused"}]';
    }

} else {


  if($admin->estConnecte()==true) // si l'administrateur est deja loggé
  {
    header("Location: home.php");
  }

  if(isset($_POST['connexion']))
  {
    $email = trim($_POST['email']);
    $mp = trim($_POST['mp']);

      ob_end_clean();
    if($admin->login($email,$mp))
    {

        echo "connected"; // message recuperé dans le scriptLogin.js avec ajax ou dans serviceLogin.ts pour les mobiles

    }

  }
}

?>