<?php
$servername = "localhost";
$username = "root";
$password = "****";
$dbname = "Projet_DSIC";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT identifiant, intitule, reference FROM projet";
$result = $conn->query($sql);
echo"[";
$i = 0 ;  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//        echo "identifiant: " . $row["identifiant"]. " - intitule: " . $row["intitule"]. " - reference " . $row["reference"]. "<br>";
    $i++;
        echo json_encode($row);
        if($i<3) echo ",";
    }

} else {
    echo "0 results";
}
echo"]";
$conn->close();
?>
