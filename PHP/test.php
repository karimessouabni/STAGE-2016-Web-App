 <?
 ?>

<html>

<head> 


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="../js/validation.min.js"></script>
  <script src="../js/scriptLogin.js"></script>



  <style>

    body{
      background-attachment: fixed; 
      font-family: 'Open Sans', sans-serif;
      padding-bottom: 40px;
    }
    .auth h1{
      padding-top: 50px;
      color:#111!important;
      font-weight:300;
      font-family: 'Open Sans', sans-serif;
    }
    .auth h1 span{
      font-size:21px;
      display:block;
      padding-top: 20px;
    }
    .auth .auth-box legend{
      color:#111;
      border:none;
      font-weight:300;
      font-size:24px;
    }
    .auth .auth-box{
      background-color:#111;
      max-width:600px;
      margin:0 auto;
      border:2px solid rgba(255, 255, 255, 0.4);
      background-color: #fff;
      background: #fff;
      margin-top:40px;
      -webkit-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.32);
      -moz-box-shadow:    0px 0px 30px 0px rgba(50, 50, 50, 0.32);
      box-shadow:         0px 0px 30px 0px rgba(50, 50, 50, 0.32);
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      -webkit-transition: background 1s ease-in-out;
      -moz-transition: background 1s ease-in-out;
      -ms-transition: background 1s ease-in-out;
      -o-transition: background 1s ease-in-out;
      transition: background 1s ease-in-out;
    }
    @media(max-width:460px){
      .auth .auth-box{
       margin:0 10px;
     }
   }

   .auth .auth-box input::-webkit-input-placeholder { /* WebKit browsers */
    font-weight:300;
  }
  .auth .auth-box input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #111;
    /*font-weight:700;*/
  }
  .auth .auth-box input::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #111;
    /*font-weight:300;*/
  }
  .auth .auth-box input:-ms-input-placeholder { /* Internet Explorer 10+ */
    color:    #111;
    /*font-weight:300;*/
  }
  .auth span.input-group-addon,
  .input-group-btn button{
    border:none;
    background: #111!important;
    color:#111!important;
  }
  .auth form{
    /*font-weight:300!important;*/
  }
  .auth form input[type="text"],
  .auth form input[type="password"],
  .auth form input[type="email"]{
    border:none;

    font-size:16px;
    height:auto;
    border-color: rgba(1, 1, 1, 0.02);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(0, 0, 0, 0.2);
    /*outline: 0 none;*/

  }

  .auth form input[type="text"]:focus,
  .auth form input[type="password"]:focus,
  .auth form input[type="email"]:focus,
  .auth form select:focus,
  .auth form textarea:focus{
    border-color: rgba(326, 339, 204, 0.8);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 1);
    outline: 0 none;
  }
/*
.auth textarea{
  background-color: rgba(255, 255, 255, 0)!important;
  color:#111!important;
  max-width: 300px;
}
.auth input[type="file"] {
  color:#111;
}
.auth form label{
    color:#111;
    font-size:24px;
    font-weight:300;
  }*/
  /*for radios & checkbox labels*/
  .auth .radio label,
  .auth label.radio-inline,
  .auth .checkbox label,
  .auth label.checkbox-inline{
    font-size: 14px;    
  }

  .auth form .help-block{
    color:#111;
  }
  .auth form select{
    background-color: rgba(255, 255, 255, 0)!important;
    background: rgba(255, 255, 255, 0);
    color:#111!important;
    border-radius:0;
    box-shadow:none;
  }
  .auth form select option{
    color:#111;
  }
  /*multiple select*/
  .auth select[multiple] option, 
  .auth select[size] {
    color:#111!important;
  }

  /*Form buttons*/
  .auth form .btn{
    color :#111;
    font-weight: 300;
    font-size: 16px;
    background:none;
    -webkit-transition: background 0.2s ease-in-out;
    -moz-transition: background 0.2s ease-in-out;
    -ms-transition: background 0.2s ease-in-out;
    -o-transition: background 0.2s ease-in-out;
    transition: background 0.2s ease-in-out;
  }
  .auth form .btn-default{
    color:#111;
    border-color:#111;
  }
  .auth form .btn-default:hover{
    background:rgba(225, 225, 225, 0.3);
    color:#111;
    border-color:#111;
  }
  .auth form .btn-primary:hover{
    background:rgba(66, 139, 202, 0.3);
  }
  .auth form .btn-success:hover{
    background:rgba(92, 184, 92, 0.3);
  }
  .auth form .btn-info :hover{
    background:rgba(91, 192, 222, 0.3);
  }
  .auth form .btn-warning:hover{
    background:rgba(240, 173, 78, 0.3);
  }
  .auth form .btn-danger:hover{
    background:rgba(217, 83, 79, 0.3);
  }
  .auth form .btn-link{
    border:none;
    color:#111;
    padding-left:0;
  }
  .auth form .btn-link:hover{
    background:none;
  }


  .auth label.label-floatlabel {
    font-weight: 300;
    font-size: 11px;
    color:#111;
    left:0!important;
    top: 1px!important;
  }


  .error{
    padding-top: 18px ;

  }

  .alert{
    padding:  6px;
    margin-bottom: 0px;
  
  }

  i.alert-danger {
   padding: 0px 5px 0px 5px;
   position: relative;
   top: -webkit-calc(50% - 60px);
   top: calc(50% - 60px);
   text-shadow: 0px 0px 3px white;
   -webkit-animation: fade 4s infinite 200ms;
   animation: fade 4s infinite 200ms;
 }

</style>

</head>


<body>

  <div class="container auth">
    <h1 class="text-center">Nouveau Projet <span>Formulaire </span> </h1>    
    <div id="big-form" class="well auth-box">
     <form action="" name="form-add-projet" id="form-add-projet" enctype="multipart/form-data" method="POST">
      <fieldset>

        <!-- Form Name -->
        <legend> &nbsp;</legend>














        <div class="form-group">
          <label class=" control-label" for="textinput">Identifiant du projet : </label>  
          <div class="">
            <input id="identifiant" name="identifiant" placeholder="identifiant" class="form-control input-md" type="text">
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="textinput">Intitulé du projet : </label>  
          <div class="">
            <input id="intitule" name="intitule" placeholder="intitulé" class="form-control input-md" type="text">
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="textinput">Références foncieres du terrain :</label>  
          <div class="">
            <input id="reference" name="reference" placeholder="reference" class="form-control input-md" type="text">
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="textinput">Superficie du terrain : </label>  
          <div class="">
            <input id="superficie" name="superficie" placeholder="superficie" class="form-control input-md" type="text">
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="textinput">Objectif du projet : </label>  
          <div class="">
            <input id="objectif" name="objectif" placeholder="objectif" class="form-control input-md" type="text">
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="textinput">Consistance : </label>  
          <div class="">
            <input id="consistance" name="consistance" placeholder="consistance" class="form-control input-md" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="textinput">Cout du projet en DH : </label>  
          <div class="">
            <input id="cout" name="cout" placeholder="cout" class="form-control input-md" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="textinput">Maitre d'ouvrage : </label>  
          <div class="">
            <input id="maitre" name="maitre" placeholder="maitre d'ouvrage" class="form-control input-md" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class=" control-label" for="textinput">Nature du maitre d'ouvrage : </label>  
          <div class="">
            <input id="naturem" name="naturem" placeholder="nature" class="form-control input-md" type="text">
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="textinput">Taux d'avancement : </label>  
          <div class="">
            <input id="taux" name="taux" placeholder="taux" class="form-control input-md" type="text">
          </div>
        </div>




        <!-- Select Basic -->
        <div class="form-group">
          <label class=" control-label" for="selectbasic">Commune : </label>
          <div class="">
            <select id="commune" name="commune" class="form-control">
              <option value="a" name="defaut">...</option>
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
          </div>
        </div>



        <div class="form-group">
          <label class=" control-label" for="selectbasic">Situation urbainistique : </label>
          <div class="">
            <select id="situation" name="situation" class="form-control">    
              <option value="a" name="defaut">...</option>          
              <option value="a" name="defaut">Agricol</option>
              <option value="v" name="defaut">val2??</option>
            </select> 
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="selectbasic">Intervention : </label>
          <div class="">
            <select id="intervention" name="intervention" class="form-control">   
              <option value="a" name="defaut">...</option>                     
              <option value="a" name="defaut">Infrastructure</option>
              <option value="v" name="defaut">Profuctif</option>
              <option value="v" name="defaut">Sociale</option>
            </select>  
          </div>
        </div>



        <div class="form-group">
          <label class=" control-label" for="selectbasic">Nature du terrain : </label>
          <div class="">
            <select id="naturet" name="naturet" class="form-control">              
              <option value="a" name="defaut">...</option>          
              <option value="p" name="defaut">Privé</option>
              <option value="h" name="defaut">Houbous</option>
              <option value="c" name="defaut">collectif</option>
              <option value="d" name="defaut">dommaine??</option>
            </select>  
          </div>
        </div>


        <div class="form-group">
          <label class=" control-label" for="selectbasic">Statut du projet : </label>
          <div class="">
            <select id="statut" name="statut" class="form-control">              
              <option value="a" name="defaut">...</option>          
              <option value="a" name="defaut">Programmé</option>
              <option value="v" name="defaut">En cours de réalisation</option>
            </select>
          </div>
        </div>

        <!-- Multiple Radios -->
        <div class="form-group">
          <label class=" control-label" for="radios">Projet conventionné :</label>
          <div class="">
            <div class="radio">
              <label class="radio-inline" for="conventionY">
                <input name="conventionY" id="conventionY" checked= "true" onclick="document.getElementById('conventionN').checked = false;" value="Y"  type="radio">
                Oui
              </label>
            </div>
            <div class="radio">
              <label class="radio-inline" for="conventionN">
                <input name="radios" id="conventionN" onchange="document.getElementById('conventionY').checked = false;" value="N" type="radio">
                Non
              </label>
            </div>
          </div>
        </div>


        <!-- Textarea -->
        <div class="form-group">
          <label class=" control-label" for="textarea">Remarques additionnelles :</label>
          <div class="">                     
            <textarea class="form-control" id="remarques" name="remarques"></textarea>
          </div>
        </div>



        <!-- Button (Double) -->
        <div class="form-group">
          <div id="imgload1"> </div>
          <div class="">
            <button type="submit" id="button1s" name="button1s" class="btn btn-success">Valider</button>
            <button id="button2id" name="button2id" class="btn btn-danger">Annuler</button>
          </div>
        </div>

        <div id="erPHPView"> </div>


      </fieldset>
    </form>
  </div>
</div>



</body>
</html>
