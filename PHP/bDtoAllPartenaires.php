<?php
session_start();
require_once 'admin.php';
require_once 'partenaire.php';

$admin = new Admin();
$partenaire = new Partenaire();
if (isset($_GET['id'])) $_SESSION["idProjetCliqued"] = $_GET['id'];
$id = $_SESSION["idProjetCliqued"];






if($admin->estConnecte()==true) // si l'administrateur est deja loggé
{
	
	$sth = $partenaire->getPartByProj($id);
	$total = $partenaire->totalrows();
	if (isset($_GET['id'])) $idPartenaire = $_GET['id']; else $idPartenaire = null;



	if($idPartenaire) $partenaire->supprimer($id);

	echo json_encode(array(
		'total' => $total,
		'rows' => $sth 
		));




}






?>

