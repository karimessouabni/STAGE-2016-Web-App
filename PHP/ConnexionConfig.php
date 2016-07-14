<?php
class ConnexionConfig
{
     
    private $host = "localhost";
    private $db_name = "Projet_DSIC";
    private $username = "root";
    private $password = "drogba.1";
    public $conn;
     
    public function dbConnection()
    {
     
        $this->conn = null;    
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }
        catch(PDOException $exception)
        {
            echo "Erreur lors de la connexion a la base de données: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>