<?php
 session_start();
require_once 'admin.php';


$user_home = new Admin();

if(!$user_home->estConnecte())
{
    header("Location: accueil.php");
}

$stmt = $user_home->getConnexion()->prepare("SELECT * FROM tbl_users WHERE userID=:uid");

$stmt->execute(array(":uid"=>$_SESSION['actuelAdmin']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
   <title>Profile de <?php echo $row['userName']; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" contenu="IE=edge">
    <meta name="viewport" contenu="width=device-width, initial-scale=1">



    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script src="../js/jquery.bootstrap-autohidingnavbar.js"></script>

    


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("btnSidenavo").text = ""; 
     document.getElementById("btnSidenavc").text = "<";
    
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("btnSidenavo").text = ">";
    document.getElementById("btnSidenavc").text = "";

}




 function load_home(){

$('#contenu').load('allProjects.php');
}

 function load_menu1(){
$('#contenu').load('test.php');
}

 function load_menu2(){
$('#contenu').load('addProjet.php');
}



</script>




 
   <style>  


@media screen and (max-width: 320px) { @viewport { width: 320px; } }   @media screen and (min-width: 768px) and (max-width: 959px) { @viewport { width: 768px; } }

body
{
    margin: 0;
    width: 100%;
    background: url('../images/light_grey.png') top left repeat-x;
    font-family: 'Open Sans', sans-serif;
}

.sidenav {
  background: url('../images/textureGrey2.png') 30px 0 repeat;
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    overflow-x: hidden;
    transition: .5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 18px 8px 8px 32px;
    text-decoration: none;
    font-size: 16px;
    color: black;
    display: block;
    transition: .3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-left: 50px;

}

#main {
    transition: margin-left .5s;
    padding: 70px;
    display   : inline-block
}

  .demo-long {
        margin-top: 100px;
        margin-bottom: 200px;
      }



 .cont .cnt {
    right: 25px;
    margin-left: 0px;
    margin-top: 50px;
    display   : inline-block;
    height:1200px;
    width: 1200px:
} 

.imgprofile{
  border-radius: 50%;
  max-width: 100px !important;
  width: 50%;
  vertical-align: middle;
  border: 0;
}

.dropdown-toggle{
cursor: auto;
display: block;
font-family: 'Open Sans', sans-serif;
font-size: 14px;
height: 43px;
line-height: 20px;
list-style-image: none;
list-style-position: outside;
list-style-type: none;
padding-bottom: 5px;
padding-left: 15px;
padding-right: 0px;
padding-top: 5px;
position: relative;
text-align: left;
text-decoration: none;
width: 82.890625px;
}


.navbar{
  background-color: rgba(255, 255, 255, 0.9);
  background: rgba(255, 255, 255, 0.9);

}





</style>
    

  </head>

  <body id="main">

          <!-- Side Menu a gauche -->
      

    <div id="mySidenav" class="sidenav">
      <a  href="#" onclick="load_home()" >Mes porjets</a>
      <a href="#" onclick="load_menu1()" >Nouveau Projet</a>
      <a href="#" onclick="load_menu2()" >Menu 3</a>
      <a href="#">Menu 4</a>
      <a href="#">Menu 5</a>
      <a href="#">Menu 6</a>
      <a href="#">Menu 7</a>
    </div>
<!-- Side Menu -->






    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>


          
          <span style="font-size:20px;cursor:pointer"  onclick="openNav()"> <a href="javascript:void(0)" id="btnSidenavo" onclick="openNav()">></a> </span>
          <span style="font-size:20px;cursor:pointer"  onclick="closeNav()"> <a href="javascript:void(0)" id="btnSidenavc" onclick="closeNav()"></a> </span>
                    



        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li  ><a href="#" onclick="load_home()" >Accueil</a></li>
            <li><a href="#" onclick="load_menu1()">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Une autre action</a></li>
                <li><a href="#">Autre chose a faire</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Navigation header</li>
                <li><a href="#">lien vers qq chose</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
               <a href="#" id="dropM" class="dropdown-toggle" data-toggle="dropdown"><img class = "imgprofile" src="https://instagramstatic-a.akamaihd.net/h1/images/ico/favicon-192.png/b407fa101800.png"><b class="glyphicon glyphicon-chevron-down"></b>

                                            </a>
              <ul class="dropdown-menu">
                <li><a href="#">Action </a></li>
                <li><a href="#">Cliquer pour une autre action</a></li>
                <li><a href="#">Reglages</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Reglages</li>
                <li><a href="#">Modifier la photo du profile</a></li>
                <li><a href="deconnexion.php" href="#">Deconnexion </a></li>
                <li class="divider"></li>
                <li><a href="#">Aide</a></li>
                <li><a href="#">Signaler un probleme</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>




<div id ="contenu" class="cont" > 

<div class="container">







      <p class="demo-long">
        Long contenu...
      </p>
      <p class="demo-long">
        Long contenu...
      </p>
      <p class="demo-long">
        Long contenu...
      </p>
      <p class="demo-long">
        Long contenu...
      </p>
      <p class="demo-long">
        Long contenu...
      </p>
      <p class="demo-long">
        Long contenu...
      </p>

    </div>





</div>

<div class='notifications bottom-right'></div>


    <script>
      $("div.navbar-fixed-top").autoHidingNavbar();
    </script>