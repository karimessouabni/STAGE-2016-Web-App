<?php

require_once 'ConnexionConfig.php';    // pour se connecter  a la BD

class Projet
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


    public function executeSql($sql)
    {
        $stmt = $this->connexion->prepare($sql);
        return $stmt;
    }


    public function insertInto($identifiant, $intitule, $reference, $superficie, $objectif, $consistance, $cout, $maitre, $naturem, $taux, $commune, $situation, $intervention, $naturet, $statut, $convention, $remarques)
    {

        $this->checkDupId($identifiant);

        // Test sur les champs requi -------> A adapter apres !!!
        if (empty ($identifiant) || empty ($intitule) || empty ($reference) || empty ($cout) || empty ($taux)) {
            echo "les champs suivant .. .. doivent etres saisis avant l'envoi !";
            exit;
        }


        try {

            $stmt = $this->connexion->prepare("INSERT INTO projet(identifiant,intitule,reference,superficie,objectif,consistance,cout,maitre,naturem, taux,commune,situation,intervention,naturet,statut,convention,remarques, localisation) 
				VALUES(:a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k, :l, :m, :n, :o, :p, :q, :r)");
            $stmt->bindparam(":a", $identifiant);
            $stmt->bindparam(":b", $intitule);
            $stmt->bindparam(":c", $reference);
            $stmt->bindparam(":d", $superficie);
            $stmt->bindparam(":e", $objectif);
            $stmt->bindparam(":f", $consistance);
            $stmt->bindparam(":g", $cout);
            $stmt->bindparam(":h", $maitre);
            $stmt->bindparam(":i", $naturem);
            $stmt->bindparam(":j", $taux);
            $stmt->bindparam(":k", $commune);
            $stmt->bindparam(":l", $situation);
            $stmt->bindparam(":m", $intervention);
            $stmt->bindparam(":n", $naturet);
            $stmt->bindparam(":o", $statut);
            $stmt->bindparam(":p", $convention);
            $stmt->bindparam(":q", $remarques);
            $stmt->bindparam(":r", "'POINT(25 12)',0");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }

    public function checkDupId($identifiant)
    {

        $sql = 'SELECT * FROM projet WHERE identifiant=:id ';
        $sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(":id" => $identifiant));
        $returnValue = $sth->fetch(PDO::FETCH_ASSOC);


        if ($sth->rowCount() > 0) // si l'user existe
        {
            echo "Identifiant deja existant";
            exit;
        }


    }

    public function updateProjet($identifiant, $intitule, $reference, $superficie, $objectif, $consistance, $cout, $maitre, $naturem, $taux, $commune, $situation, $intervention, $naturet, $statut, $convention, $remarques)
    {


        // Test sur les champs requi -------> A adapter apres !!!
        if (empty ($identifiant) || empty ($intitule) || empty ($reference) || empty ($cout) || empty ($taux)) {
            echo "les champs suivant ....... doivent etres saisis avant l'envoi !";
            exit;
        }


        try {

            $stmt = $this->connexion->prepare("UPDATE projet SET  intitule = :b ,reference = :c ,superficie =:d, objectif = :e,consistance =:f, cout = :g, maitre =:h, naturem = :i, taux = :j, commune = :k ,situation = :l, intervention = :m, naturet = :n, statut = :o, convention = :p, remarques = :q WHERE identifiant = :a");

            $stmt->bindparam(":a", $identifiant, PDO::PARAM_STR);
            $stmt->bindparam(":b", $intitule, PDO::PARAM_STR);
            $stmt->bindparam(":c", $reference, PDO::PARAM_STR);
            $stmt->bindparam(":d", $superficie, PDO::PARAM_STR);
            $stmt->bindparam(":e", $objectif, PDO::PARAM_STR);
            $stmt->bindparam(":f", $consistance, PDO::PARAM_STR);
            $stmt->bindparam(":g", $cout, PDO::PARAM_STR);
            $stmt->bindparam(":h", $maitre, PDO::PARAM_STR);
            $stmt->bindparam(":i", $naturem, PDO::PARAM_STR);
            $stmt->bindparam(":j", $taux, PDO::PARAM_STR);
            $stmt->bindparam(":k", $commune, PDO::PARAM_STR);
            $stmt->bindparam(":l", $situation, PDO::PARAM_STR);
            $stmt->bindparam(":m", $intervention, PDO::PARAM_STR);
            $stmt->bindparam(":n", $naturet, PDO::PARAM_STR);
            $stmt->bindparam(":o", $statut, PDO::PARAM_STR);
            $stmt->bindparam(":p", $convention, PDO::PARAM_STR);
            $stmt->bindparam(":q", $remarques, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }

    public function getAllProjects($limit, $offset, $sortParam, $orderType, $search)
    {


        if ($search == null) $sql = 'SELECT * FROM projet ORDER BY ' . $sortParam . ' ' . $orderType . ' Limit :start, :limit ';
        else  $sql = 'SELECT * FROM projet WHERE 
				identifiant LIKE \'%' . $search . '%\' OR 
			intitule LIKE \'%' . $search . '%\' OR
			reference LIKE \'%' . $search . '%\' OR 
			superficie LIKE \'%' . $search . '%\' OR 
			objectif LIKE \'%' . $search . '%\' OR 
			consistance LIKE \'%' . $search . '%\' OR 
			cout LIKE \'%' . $search . '%\' OR 
			maitre LIKE \'%' . $search . '%\' OR 
			naturem LIKE \'%' . $search . '%\' OR 
			taux LIKE \'%' . $search . '%\' OR 
			commune LIKE \'%' . $search . '%\' OR 
			situation LIKE \'%' . $search . '%\' OR 
			intervention LIKE \'%' . $search . '%\' OR 
			naturet LIKE \'%' . $search . '%\' OR 
			statut LIKE \'%' . $search . '%\' OR 
			convention LIKE \'%' . $search . '%\' OR 
			remarques LIKE \'%' . $search . '%\'

			ORDER BY ' . $sortParam . ' ' . $orderType . ' Limit :start, :limit  
			';

        //else  $sql = 'SELECT * FROM projet ';
        // $sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        // $returnValue=$sth->fetch(PDO::FETCH_ASSOC);
        $sth = $this->connexion->prepare($sql);
        $sth->bindParam(':start', $offset, PDO::PARAM_INT);
        $sth->bindParam(':limit', $limit, PDO::PARAM_INT);


        $sth->execute();
        $returnValue = $sth->fetchAll(PDO::FETCH_ASSOC);
        // $returnValue=$sth->fetchAll();


        if ($sth->rowCount() > 0) // si l'user existe
        {
            return $returnValue;

        }

    }


    public function totalrows($offset)
    {


        $sql = 'SELECT * FROM projet ';
        // $sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        // $returnValue=$sth->fetch(PDO::FETCH_ASSOC);
        $sth = $this->connexion->prepare($sql);
        $sth->execute();
        $returnValue = $sth->fetchAll(PDO::FETCH_ASSOC);
        // $returnValue=$sth->fetchAll();
        return $sth->rowCount();


    }

    public function supprimer($identifiant)
    {
        $sql = 'DELETE FROM projet WHERE identifiant=:id';
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


    public function sort($row, $typeSort)
    {
        $sql = 'SELECT * FROM projet ORDER BY :row :typeSort ';
        $sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(':row' => $row, ':typeSort' => $typeSort));
        $returnValue = $sth->fetchAll(PDO::FETCH_ASSOC);
        // $returnValue=$sth->fetchAll();

        if ($sth->rowCount() > 0) // si l'user existe
        {

            return $returnValue;

        }


    }




    /*


        public function register($uname,$email,$upass,$code)
        {
            try
            {
                $password = md5($upass);
                $stmt = $this->connexion->prepare("INSERT INTO tbl_users(userName,userEmail,userPass,tokenCode)
                                                             VALUES(:user_name, :user_mail, :user_pass, :active_code)");
                $stmt->bindparam(":user_name",$uname);
                $stmt->bindparam(":user_mail",$email);
                $stmt->bindparam(":user_pass",$password);
                $stmt->bindparam(":active_code",$code);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
            }
        }
        */


    // function to escape data and strip tags
    public function safestrip($string)
    {
        $string = strip_tags($string);
        return $string;
    }


    public function redirect($url)
    {
        header("Location: $url");
    }


    function post($key)
    {
        if (isset($_POST[$key]))
            return $_POST[$key];
        return false;
    }


}