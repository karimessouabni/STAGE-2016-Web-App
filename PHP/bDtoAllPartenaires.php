<?php
session_start();
require_once 'admin.php';
require_once 'partenaire.php';

$admin = new Admin();
$partenaire = new Partenaire();
if (isset($_GET['id'])) $_SESSION["idProjetCliqued"] = $_GET['id'];
$id = $_SESSION["idProjetCliqued"];


if (isset($_GET['op'])) $operation = $_GET['op']; else $operation = null;
if (isset($_GET['nom'])) $nom = $_GET['nom']; else $nom = null;
if (isset($_GET['sommeV'])) $sommeV = $_GET['sommeV']; else $sommeV = null;
if (isset($_GET['sommeT'])) $sommeT = $_GET['sommeT']; else $sommeT = null;
if (isset($_GET['idProjet'])) $idProjet = $_GET['idProjet']; else $idProjet = null;
if (isset($_GET['idP'])) $idPartenaire = $_GET['idP']; else $idPartenaire = null;

if ($admin->estConnecte() == true) // si l'administrateur est deja loggé
{

    if ($operation == "Ajouter") {

        $partenaire->insertInto($nom, $sommeV, $sommeT, $id);

    } else if ($operation == "supPartenaire") {


        if ($idPartenaire) $partenaire->supprimer($idPartenaire);
    } else if ($operation == "Modifier") {

        if ($idPartenaire) $partenaire->updatePartenaire($nom, $sommeV, $sommeT, $idPartenaire);

    }

    $sth = $partenaire->getPartByProj($id);
    $total = $partenaire->totalrows();
    echo json_encode(array(
        'total' => $total,
        'rows' => $sth
    ));


}


?>

