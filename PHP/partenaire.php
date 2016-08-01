<?php

require_once 'ConnexionConfig.php';	// pour se connecter 

class Partenaire
{	

	private $connexion;
	
	public function __construct()
	{
		$database = new ConnexionConfig();
		$db = $database->dbConnection();
		$this->connexion = $db;

	}


	public function getConnexion() {
		return $this->connexion;
	}


	// function to escape data and strip tags

	public function totalrows(){
		$sql = 'SELECT * FROM projet '; 
		$sth = $this->connexion->prepare($sql);
		$sth->execute();
		$returnValue=$sth->fetchAll(PDO::FETCH_ASSOC);
		return $sth->rowCount()  ;



	}

	public function insertInto($nom, $sommeV, $sommeT, $idP)
	{


		// Test sur les champs requi -------> A adapter apres !!!
		if (empty ($nom)) {
			echo "les champs suivant .. nom +.. doivent etres saisis avant l'envoi !";
			exit;
		}


		try {

			$stmt = $this->connexion->prepare("INSERT INTO partenaires (id, nom, somme_versee, somme_totale, id_Projet)  
				VALUES(NULL, :a, :b, :c, :d)");


			$stmt->bindparam(":a", $nom);
			$stmt->bindparam(":b", $sommeV);
			$stmt->bindparam(":c", $sommeT);
			$stmt->bindparam(":d", $idP);


			$stmt->execute();
			return $stmt;

		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}

	}

	public function getPartByProj($idProjet)
	{
		$idProjet = $this->safestrip($idProjet);


		$sql = 'SELECT * FROM partenaires WHERE id_Projet=:id';
		$sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$sth->execute(array(":id"=>$idProjet));



		$returnValue=$sth->fetchAll(PDO::FETCH_ASSOC);


		return $returnValue; 

	}

	public function safestrip($string)
	{
		$string = strip_tags($string);
		return $string;
	}

	public function updatePartenaire($nom, $sommeV, $sommeT, $identifiant)
	{

		// Test sur les champs requi -------> A adapter apres !!!
		if (empty ($nom)) {
			echo "nom non fourni !";
			exit;
		}

		try {

			$stmt = $this->connexion->prepare("UPDATE partenaires SET nom = :b, somme_versee = :c ,somme_totale = :d  WHERE id = :a");

			$stmt->bindparam(":a", $identifiant, PDO::PARAM_STR);
			$stmt->bindparam(":b", $nom, PDO::PARAM_STR);
			$stmt->bindparam(":c", $sommeV, PDO::PARAM_STR);
			$stmt->bindparam(":d", $sommeT, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}

	}




	public function supprimer($identifiant){
		$sql = 'DELETE FROM partenaires WHERE id=:id'; 
		$sth = $this->connexion->prepare($sql);
		$count = $sth->execute(array(":id"=>$identifiant));



			if($count > 0) // si l'user existe 
			{
				echo $identifiant."Identifiant Supprimé";
				exit ;
			}
			else {
				echo "ERREUR : Identifiant non Supprimé";
				exit ;
			}
		}


	}

	?>