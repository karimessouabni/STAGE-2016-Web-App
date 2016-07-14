<?php
include_once './includes/cnx.php' ;

$id=$_POST['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
$sexe=$_POST['selectSexe'];
$secprenom=$_POST['secprenom'];
$datenais=$_POST['dnais'];
$salaire=$_POST['salaire'];




$affiche = NULL;




   $sql = "INSERT INTO AMBULANCIER (IDAMBULANCIER, nom, prenom, secprenom, tel, sexe, dateNaissance, salaire)
   VALUES ('$id','$nom', '$prenom', '$secprenom', '$tel','$sexe', '$datenais','$salaire')";
   $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 


  if ($req){
                              				?>
                                            <script type="text/javascript">
                                            alert("Ajoute avec succes ! :) ");
                                             window.location.href = "./espaceadmin.php";
                                            </script>
                                            <?php

                                            
                                         
                              }else{
                              				?>
                                            <script type="text/javascript">
                                            alert("Erreur lors de l'Ajout du personnel !  ");
                                            history.back();
                                            history.back();
                                            </script>
                                            <?php
                                           
                              }

                              





?>


