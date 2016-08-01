<?php
session_start();
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 01/08/2016
 * Time: 13:52
 */
require_once 'admin.php';
require_once 'fichier.php';
$admin = new Admin();
$fichier = new Fichier();


$id = $_SESSION["idProjetCliqued"];


if ($admin->estConnecte() == true) // si l'administrateur est deja loggé
{
    $fnom = random_string(10);


    $targetDir = "../telechargements/";
    $fileName = $_FILES['file']['name'];
    $fileName = $fnom . $fileName;
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        //insert file information into db table


        $fichier->insertInto($fileName, $id);


    }


}


function random_string($length)
{
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}




