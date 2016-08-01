<?php
require_once 'admin.php';
require_once 'projet.php';
$admin = new Admin();
$projet = new Projet();


$servername = "localhost";
$username = "root";
$password = "drogba.1";
$dbname = "Projet_DSIC";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//if(!empty($_GET["search"])) {  

if (isset($_GET['limit'])) $limit = (int)$_GET['limit']; else $limit = 5;
if (isset($_GET['offset'])) $offset = (int)$_GET['offset']; else $offset = 0;

if (isset($_GET['sort'])) $sort = $_GET['sort']; else $sort = "identifiant";
if (isset($_GET['order'])) $order = $_GET['order']; else $order = "ASC";

if (isset($_GET['search'])) $search = $_GET['search']; else $search = null;

if (isset($_GET['id'])) $id = $_GET['id']; else $id = null;
if (isset($_GET['sup'])) $sup = $_GET['sup']; else $sup = null;


if (isset($_GET['mobile'])) {

    if ($id) $projet->supprimer($id);

    $total = $projet->totalrows($offset);
    $sth = $projet->getAllProjects($total, $offset, $sort, $order, $search);
    echo json_encode($sth);
} else {

    $sth = $projet->getAllProjects($limit, $offset, $sort, $order, $search);
    $total = $projet->totalrows($offset);
    echo json_encode($sth);
}


$conn->close();


?>
