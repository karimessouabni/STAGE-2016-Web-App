<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 01/08/2016
 * Time: 09:26
 */
session_start();

require_once 'admin.php';
require_once 'visite.php';

$admin = new Admin();
$visite = new Visite();
if (isset($_GET['id'])) $_SESSION["idProjetCliqued"] = $_GET['id'];
$id = $_SESSION["idProjetCliqued"];


if (isset($_GET['op'])) $operation = $_GET['op']; else $operation = null;
if (isset($_GET['titre'])) $titre = $_GET['titre']; else $titre = null;
if (isset($_GET['date'])) $date = $_GET['date']; else $date = null;
if (isset($_GET['remarques'])) $remarques = $_GET['remarques']; else $remarques = null;
if (isset($_GET['idProjet'])) $idProjet = $_GET['idProjet']; else $idProjet = null;
if (isset($_GET['idV'])) $idVisit = $_GET['idV']; else $idVisit = null;

if ($admin->estConnecte() == true) // si l'administrateur est deja loggé
{

    if ($operation == "Ajouter") {

        $visite->insertInto($titre, $date, $remarques, $id);

    } else if ($operation == "supV") {

        if ($idVisit) $visite->supprimer($idVisit);
    } else if ($operation == "Modifier") {

        if ($idVisit) $visite->updateVisit($titre, $date, $remarques, $idVisit);

    }

    $sth = $visite->getVisitByProj($id);
    $total = $visite->totalrows();
    echo json_encode(array(
        'total' => $total,
        'rows' => $sth
    ));


}


?>

