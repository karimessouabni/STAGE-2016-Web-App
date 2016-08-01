<?php
/**
 * Created by PhpStorm.
 * User: karim
 * Date: 01/08/2016
 * Time: 08:50
 */


require_once 'ConnexionConfig.php';    // pour se connecter

class Visite
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
        $sql = 'SELECT * FROM visite ';
        $sth = $this->connexion->prepare($sql);
        $sth->execute();
        $returnValue = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $sth->rowCount();


    }

    public function insertInto($titre, $date, $remarques, $idP)
    {


        // Test sur les champs requi -------> A adapter apres !!!
        if (empty ($titre)) {
            echo "les champs suivant .. titre .. doivent etres saisis avant l'envoi !";
            exit;
        }


        try {

            $stmt = $this->connexion->prepare("INSERT INTO visite (id, titre, date, remarques, id_projet)  
				VALUES(NULL, :a, :b, :c, :d)");


            $stmt->bindparam(":a", $titre);
            $stmt->bindparam(":b", $date);
            $stmt->bindparam(":c", $remarques);
            $stmt->bindparam(":d", $idP);


            $stmt->execute();
            return $stmt;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }

    public function getVisitByProj($idProjet)
    {
        $idProjet = $this->safestrip($idProjet);


        $sql = 'SELECT * FROM visite WHERE id_projet=:id';
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

    public function updateVisit($titre, $date, $remarques, $identifiant)
    {

        // Test sur les champs requi -------> A adapter apres !!!
        if (empty ($titre)) {
            echo "nom non fourni !";
            exit;
        }

        try {

            $stmt = $this->connexion->prepare("UPDATE visite SET  titre = :b, date= :c , remarques = :d  WHERE id = :a");

            $stmt->bindparam(":a", $identifiant, PDO::PARAM_STR);
            $stmt->bindparam(":b", $titre, PDO::PARAM_STR);
            $stmt->bindparam(":c", $date, PDO::PARAM_STR);
            $stmt->bindparam(":d", $remarques, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }


    public function supprimer($identifiant)
    {
        $sql = 'DELETE FROM visite WHERE i=:id';
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