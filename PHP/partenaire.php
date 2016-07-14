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
	public function safestrip($string){
		$string = strip_tags($string);
		return $string;
	}

	public function totalrows(){
		$sql = 'SELECT * FROM projet '; 
		$sth = $this->connexion->prepare($sql);
		$sth->execute();
		$returnValue=$sth->fetchAll(PDO::FETCH_ASSOC);
		return $sth->rowCount()  ;



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