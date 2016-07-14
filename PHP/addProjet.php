<?php 
include ("./includes/functions.php");


?>

<html>
<head>
  <title> Formulaire </title>


  <style>

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
      height:100%;
      width: 100%:
      transition: margin-left .5s;
      padding: 16px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
  </style>



  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.3.7/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.ausu-autosuggest.js"></script>
  <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/2.3.7/jquery.validate.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

  <style type="text/css">
    th, td {
      padding: 20px 4px 7px 233px;
      border-bottom: 1px solid #AAA;
    }
    body {
      font-size: 14px;
      color: #111;
      background: url('../images/light_grey.png') top left repeat-x;
      font-family: 'Open Sans', sans-serif;
    }
  </style>


</head>	

<body>





  <div id="main">
    
    <span style="font-size:30px"></span>

    
    <center>
      <form method="post" action="./ajouterAmbulancier.php" > 
        
       <table>

         

        <tr>
          <td><center><b>Identifiant du projet : </center></b></td>
          <td><input type="text" size="15" name="id" value=""    /></td>
        </tr>

        <tr>
          <td><center><b> Références foncieres du terrain : </center></b></td>
          <td><input type="text" size="15" name="nom" value=""       /></td>
        </tr>

        <tr>
          <td><center><b>Superficie du terrain : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>

        <tr>
          <td><center><b>Nature du terrain : </center></b></td>
          <td><div class="ausu-suggest" style=" position:absolute;margin: -20px 0px 0px 0px;"> 
            <select  name="selectSexe" class="select" id="selectSexe" >
              <option value="p" name="defaut">Privé</option>
              <option value="h" name="defaut">Houbous</option>
              <option value="c" name="defaut">collectif</option>
              <option value="d" name="defaut">dommaine??</option>
            </select>  

          </div></td>
        </tr>


        <tr>
          <td><center><b>Situation urbainistique : </center></b></td>
          <td><div class="ausu-suggest" style=" position:absolute;margin: -20px 0px 0px 0px;"> 
            <select  name="selectSexe" class="select" id="selectSexe" >
              <option value="a" name="defaut">Agricol</option>
              <option value="v" name="defaut">val2??</option>
            </select>  

          </div></td>
        </tr>


        <tr>
          <td><center><b>Commune : </center></b></td>
          <td><div class="ausu-suggest" style=" position:absolute;margin: -20px 0px 0px 0px;"> 
            <select  name="selectSexe" class="select" id="selectSexe" >
              <option value="a" name="defaut">Oualili</option>
              <option value="v" name="defaut">M'Rhassiyine</option>
              <option value="a" name="defaut">Sidi Abdallah Al Khayat</option>
              <option value="a" name="defaut">Charqaoua</option>
              <option value="a" name="defaut">N'Zalat Bni Amar</option>
              <option value="a" name="defaut">Dkhissa</option>
              <option value="a" name="defaut">Oued Jdida</option>
              <option value="a" name="defaut">M'Haya</option>
              <option value="a" name="defaut">Majjate</option>
              <option value="a" name="defaut">Sidi Slimane Moul Al Kifane</option>
              <option value="a" name="defaut">Ain Orma</option>
              <option value="a" name="defaut">Dar Oum Soltane</option>
              <option value="a" name="defaut">Ait Ouallal</option>
              <option value="a" name="defaut">Oued Rommane</option>
              <option value="a" name="defaut">Ain Jemaa</option>
              <option value="a" name="defaut">Ain Karma</option>
              <option value="a" name="defaut">Karmet Ben Salem</option>
            </select>  

          </div></td>
        </tr>

        <tr>
          <td><center><b>Intitulé du projet : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>


        <tr>
          <td><center><b>Intervention : </center></b></td>
          <td><div class="ausu-suggest" style=" position:absolute;margin: -20px 0px 0px 0px;"> 
            <select  name="selectSexe" class="select" id="selectSexe" >
              <option value="a" name="defaut">Infrastructure</option>
              <option value="v" name="defaut">Profuctif</option>
              <option value="v" name="defaut">Sociale</option>
            </select>  

          </div></td>
        </tr>


        <tr>
          <td><center><b> Objectif du projet : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>
        
        <tr>
          <td><center><b> Consistance : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>

        <tr>
          <td><center><b> Situation geographique du terrain : </center></b></td>
          <td><div id="map_canvas"></div> CARTE GOOGLE MAP ?</td>
        </tr>

        <tr>
          <td><center><b> Cout du projet en DH : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>

        <tr>
          <td><center><b> Maitre d'ouvrage : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>

        <tr>
          <td><center><b> Nature du maitre d'ouvrage : </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>


        <tr>
          <td><center><b> taux d'avancement </center></b></td>
          <td><input type="text" size="15" name="prenom" value=""    /></td>
        </tr>

        <tr>
          <td><center><b>Statut du projet : </center></b></td>
          <td><div class="ausu-suggest" style=" position:absolute;margin: -20px 0px 0px 0px;"> 
            <select  name="selectSexe" class="select" id="selectSexe" >
              <option value="a" name="defaut">Programmé</option>
              <option value="v" name="defaut">En cours de réalisation</option>
            </select>  

          </div></td>
        </tr>

        <tr>
          <td><center><b> projet conventionné </center></b></td>
          <td> <input type="checkbox" ng-model="myCheck"></td>
        </tr>

        

        <tr>
          <td> 
          </td>
          
          <td>
            <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Valider </button>
            <button type="reset" class="btn"><i class="icon-ok icon-remove"></i> Annuler</button>
          </td>
        </tr>
        
      </table>  
    </form></center>


  </div>


  <body>


    </html>