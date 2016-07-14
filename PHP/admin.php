<?php

require_once 'ConnexionConfig.php';	// pour se connecter 

class Admin
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


	public function login($emails,$mps)
	{
		$email = $this->safestrip($emails);
		$mp = $this->safestrip($mps);

		
		try
		{

			$sql = 'SELECT * FROM tbl_users WHERE userEmail=:email'; 
			$sth = $this->connexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$sth->execute(array(":email"=>$email));
			$userRow=$sth->fetch(PDO::FETCH_ASSOC);


			
			if($sth->rowCount() == 1) // si l'user existe 
			{
				
				if($userRow['userStatus']=="Y") // si il a activé son compte 
				{
					if($userRow['userPass']==$mp) // si le mp est correcte// if($userRow['userPass']==md5($mp)) // si le mp est correcte
					{
						//set session
						$_SESSION['AdminAutorise'] = true ;
						$_SESSION['actuelAdmin'] = $userRow['userID'] ;
						return true;
					}
					else // Mot de passe faut -> a gerer a part 
					{
						header("Location: accueil.php?errormp");
						exit;
					}
				}
				else // Admin non verifié 
				{
					header("Location: accueil.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: accueil.php?errormail");
				exit;
			}		
		}
		catch(PDOException $exception)
		{
			echo $exception->getMessage();
		}
	}
	
	
	public function estConnecte()
	{
		if(isset($_SESSION['AdminAutorise']))
		{
			return true;
		}
		else return false ;
	}
	public function deconnexion()
	{
		session_destroy();
		$_SESSION['AdminAutorise'] = false;
	}
	
	
	/*
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="your_gmail_id_here@gmail.com";  
		$mail->Password="your_gmail_password_here";            
		$mail->SetFrom('your_gmail_id_here@gmail.com','Coding Cage');
		$mail->AddReplyTo("your_gmail_id_here@gmail.com","Coding Cage");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}
	
		

		*/

	
}