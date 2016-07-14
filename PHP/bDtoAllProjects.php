<?php
session_start();
require_once 'admin.php';
require_once 'projet.php';
$admin = new Admin();
$projet = new Projet();






if($admin->estConnecte()==true) // si l'administrateur est deja loggé
{

	if (isset($_GET['limit'])) $limit = (int)$_GET['limit']; else $limit = 5;
	if (isset($_GET['offset'])) $offset = (int)$_GET['offset']; else $offset = 1;

	if (isset($_GET['sort'])) $sort = $_GET['sort']; else $sort = "identifiant";
	if (isset($_GET['order'])) $order = $_GET['order']; else $order = 'ASC';

	if (isset($_GET['search'])) $search = $_GET['search']; else $search = null;

	if (isset($_GET['id'])) $id = $_GET['id']; else $id = null;
	if (isset($_GET['sup'])) $sup = $_GET['sup']; else $sup = null;


	if($id) $projet->supprimer($id);



	$sth = $projet->getAllProjects($limit, $offset, $sort, $order, $search);

	$total = $projet->totalrows($offset) ;

	echo json_encode(array(
		'total' => $total,
		'rows' => $sth 
	));




}






?>

