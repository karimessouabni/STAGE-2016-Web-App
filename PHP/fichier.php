<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 01/08/2016
 * Time: 08:50
 */


require_once 'ConnexionConfig.php';    // pour se connecter

class Fichier
{

    private $connexion;

    public function __construct()
    {
        $database = new ConnexionConfig();
        $db = $database->dbConnection();
        $this->connexion = $db;

    }


    public function getConnexion()
    {
        return $this->connexion;
    }


    // function to escape data and strip tags

    public function totalrows()
    {
        $sql = 'SELECT * FROM fichier ';
        $sth = $this->connexion->prepare($sql);
        $sth->execute();
        $returnValue = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $sth->rowCount();


    }

    public function insertInto($fileName, $id)
    {

        $this->connexion->query("INSERT INTO fichier (nom, dateTel, projet_id) VALUES('" . $fileName . "','" . date("Y-m-d H:i:s") . "','" . $id . "')");

    }

    public function getFileByProj($idProjet)
    {
        $idProjet = $this->safestrip($idProjet);


        $sql = 'SELECT `id`,`nom` as nomChiffre, SUBSTRING(`nom`, 11) as nom, `dateTel`, `projet_id` FROM fichier WHERE projet_id=:id';
        $sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $idProjet));


        $returnValue = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $returnValue;

    }

    public function safestrip($string)
    {
        $string = strip_tags($string);
        return $string;
    }

    public function supprimer($identifiant)
    {
        $sql = 'DELETE FROM fichier WHERE id=:id';
        $sth = $this->connexion->prepare($sql);
        $count = $sth->execute(array(":id" => $identifiant));


        if ($count > 0) // si l'user existe
        {
            echo $identifiant . "Identifiant Supprimé";
            exit;
        } else {
            echo "ERREUR : Identifiant non Supprimé";
            exit;
        }
    }


}