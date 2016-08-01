
  <?php
  // session_start();
  require_once 'admin.php';
  $admin = new Admin();

  if($admin->estConnecte()==true) // si l'administrateur est deja loggé
  {
    header("Location: home.php");
  }

  ?>

  <!DOCTYPE html>

  <html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <script src="../js/jquery-1.11.3.js"></script>

      <script src="../js/jquery-ui.js"></script>


      <link rel="stylesheet" type="text/css" href="../css/sLogin.css">
    <link rel="stylesheet" type="text/css" href="../css/styleWizardInscription.css">
    <link rel="stylesheet" type="text/css" href="../css/dropzone.css">


      <script src="../bootstrap/js/bootstrap.min.js"></script>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script src="../js/validation.min.js"></script>
<script src="../js/scriptLogin.js"></script>
<script src="../js/dropzone.js"></script>

    
      <style type="text/css">

.col-md-2{
  min-width: 90px;
}

  .form-control { 
    min-width: 90px;
    margin-bottom: 5px; 
    padding: 0px 15px 0px 15px;}

     .dropzone{
      background-color: #f2fff4;
    border-style: dashed;
    border-color: #ccc;
    line-height: 200px;
    margin: 0px 0px 20px 0px;
    text-align: center;
  }

.tab-pane{
padding: 50px 50px 0px 50px;

}
.row{
  padding-right: 0px;
}
textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
 .uneditable-input:focus, .dropzone{   
  border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;
}

      .error{
      padding-top: 18px ;

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

@-webkit-keyframes fade {
        50% {
            opacity: 0.02;
        }
    }
 
    @keyframes fade {
        50% {
            opacity: 0.02;
        }
    }
      </style>

  <script type="text/javascript">

  /*-- Gestion des animations pour l'affichafe du dormulaire de perte de Mot de Passe --*/
  $(document).ready(function() {
    $('#mpOublie').click(function(e) {
      //document.getElementById("form-cnx").style.display  = "none";
      e.preventDefault();
      $('div#form-mpoublie').toggle('500');
      $('div#form-cnx').toggle('500');
      
    });

    $('#retourCnx').click(function(e) {
      
      e.preventDefault();
      $('div#form-mpoublie').toggle('500');
      $('div#form-cnx').toggle('500');
      
      

    });


/*-- Gestion des animations pour l'affichafe du formulaire pour l'inscription --*/

  
    $('#inscrir').click(function(e) {
      document.getElementById("loginbox").className  = 'mainbox col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-9';
      $('div#form-cnx').toggle('500');
      $('div#form-inscription').toggle('500');
      
      
      e.preventDefault();
      
    });
    $('#retourAccueil').click(function(e) {
      document.getElementById("loginbox").className  = 'mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3';
      e.preventDefault();
      $('div#form-cnx').toggle('500');
      $('div#form-inscription').toggle('500');
      
      

    });
  


   });


  </script>
      

  <script>



  Dropzone.options.uploadme = {
    maxFilesize: 500,
    maxFiles: 1,
    paramName: 'photos',
    // url: 'upload.php',
    dictDefaultMessage: "Drag and drop ou cliquer ici !",
    uploadMultiple: false,

    maxfilesexceeded: function(file) {
        this.removeAllFiles();
        this.addFile(file);
    },
    init: function() {
      this.on("uploadprogress", function(file, progress) {
        console.log("File progress", progress);
      });
    }
  };



$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

function shakeIt() {
    $(".container").effect( "shake", { direction: "right", times: 2, distance: 20}, 500 );
}



    $(".next-step").click(function (e) { // Prends en charge la validation du formulaire d'inscription aussi



        if (document.getElementById("nom").value==""){
           document.getElementById("nom").className += " alert-danger";
        shakeIt();
        }else if (document.getElementById("prenom").value==""){
          document.getElementById("prenom").className += " alert-danger";
        shakeIt();
        }else if (document.getElementById("email").value==""){
             document.getElementById("email").className += " alert-danger";
        shakeIt();
        }else if (document.getElementById("emailconf").value==""){
             document.getElementById("emailconf").className += " alert-danger";
        shakeIt();
        }else if (document.getElementById("pwd").value==""){
             document.getElementById("pwd").className += " alert-danger";
        shakeIt();
        }else if (document.getElementById("pwdconf").value==""){
             document.getElementById("pwdconf").className += " alert-danger";
        shakeIt();
        }
        else if (!  ($('#email').hasClass('alert-danger')  || $('#emailconf').hasClass('alert-danger') ||
          $('#pwd').hasClass('alert-danger') || $('#pwdconf').hasClass('alert-danger')
          ) )  {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);
      } 

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

  </script>
     
     




  </head>

  <body>

  <div class="container">
    
          


      <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
          
          
          <div class="panel panel-default" >
              <div class="panel-heading">
                  <div class="panel-title text-center"><i class="glyphicon glyphicon-home"></i> DSIC</div>
              </div>     

              



              <div class="panel-body" id="form-cnx">

                  <form action="" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST"  >
                     
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="id" type="text" class="form-control" name="email" required placeholder="email">                                        
                      </div>

                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input id="mp" type="password" class="form-control" name="mp" required  placeholder="mot de passe">

                      </div>                                                                  

                        <div class="form-group">

                          <!-- Button -->
                          <div class="col-sm-12 controls">

                              <button type="submit" href="#" class="btn btn-success pull-right"  name="connexion" id="btn-connexion"><i class="glyphicon glyphicon-log-in"></i> &nbsp;Connexion</button> <div id="imgload"> </div>
                                         <div>


               <a href="#" id="mpOublie"><small> <i class="glyphicon glyphicon-triangle-right"></i> Mot de passe oublié ?</small></a>

            </div>                          
            <div  class="error" id="error">
        </div>
                          </div>


                      </div>
                      <div><button type="submit" href="#" id="inscrir" class="btn btn-warning pull-left" name="inscription"><i class="glyphicon glyphicon-check"></i>&nbsp;Inscription</button>   </div>

                  </form>     
              </div>  





<!-- Div gestion des inscriptions -->

<div class="panel-body" style="display: none;" id="form-inscription">
      <h4 class="">
        Inscription
      </h4>
       <form class="form-horizontal" enctype="multipart/form-data" method="POST" >

          <p class="help-block">
              <a  href="#" id="retourAccueil"><small> <i class="glyphicon glyphicon-arrow-left"></i> Vous avez déjà un compte ? Connexion</small></a>
          </p>
      </form>




      <div class="containerInsc">
  <div class="row">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Infos personnelles">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Photo de profil">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Validation par mail">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Fin de l'inscription">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form name="form-ins" id="form-ins">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Etape 1</h3>
                        <p>Recueil d'informations personnelles : </p>
                       
                      
                          <label class="col-xs-2 col-md-2" for="">
                                          Nom :</label> 
                          <div class="col-xs-3 col-md-4">
                            <input id="nom" type="text" class="form-control" name="nom" required  placeholder="votre Nom">
                          </div>

                 
                 
                      <label class="col-xs-2 col-md-2" for="">
                                          Prenom :</label> 
                          <div class="col-xs-4 col-md-4">
                            <input id="prenom" type="text" class="form-control" name="prenom" required  placeholder="votre Prenom">
                          </div>



<!-- Ligne 2  -->
  
                          
                          
                          <label class="col-xs-6 col-md-6" for="">
                                          Email :</label> 
                          <div class="col-xs-6 col-md-6 ">
                            <input id="email" type="text" class="form-control" name="email" required  placeholder="votre adresse mail">
                          </div>


<!-- Ligne 3  -->

                     

                          <label class="col-xs-6 col-md-6" for="">
                                           Confirmation :</label> 
                          <div class="col-xs-6 col-md-6 ">
                            <input id="emailconf" type="text" class="form-control" name="emailconf" required  placeholder="saisir de nouveau l'adresse mail ">
                          </div>
<!-- Ligne 4  -->

                     

                          <label class="col-xs-6 col-md-6" for="">
                                           Mot de passe :</label> 
                          
                          <div class="col-xs-6 col-md-6 ">
                            <input id="pwd" type="password" class="form-control" name="pwd" required  placeholder="créez un mot de passe">
                          </div>
<!-- Ligne 5  -->

                     

                          <label class="col-xs-6 col-md-6" for="">
                                           Confirmation :  </label> 
                          <div class="col-xs-6 col-md-6 ">
                            <input id="pwdconf" type="password" class="form-control" name="pwdconf" required  placeholder="saisir de nouveau le mot de passe">
                          </div>                          

                   

                        <ul class="list-inline pull-right">
                            <li><button type="button" name="nextEtape1" class="btn btn-primary next-step  " style="margin-top: 15px !important;">Valider et continuer <i class="glyphicon glyphicon-chevron-right"></i></button></li>
                        </ul>
                    </div>



<!-- PAGE  2  -->
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Etape 2</h3>
                        <p>Photo de Profil</p>
                        <!-- Change /upload-target to your upload address -->
                    <div action="#" id="uploadme" class="dropzone needsclick dz-clickable"></div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default next-step">Passer cette etape</button></li>
                            <li><button type="button" class="btn btn-default prev-step">Retour</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Valider et continuer <i class="glyphicon glyphicon-chevron-right"></i></button></li>
                        </ul>
                    </div>


<!-- PAGE  3  -->
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Fin de l'inscription</h3>
                        <p> En cliquant sur le bouton Valider, vous indiquez avoir pris connaissance et accepté les Conditions Générales d'Utilisation</p>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Retour</button></li>
                            <li><button type="submit" href="#"  class="btn btn-primary btn-info-full next-step">Valider <i class="glyphicon glyphicon-chevron-right"></i></button></li>
                        </ul>
                    </div>



<!-- PAGE  4  -->

                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Activation de votre compte</h3>
                        <p>Votre inscription a ete prise en compte </p>
                        <p>Un email vous a été envoyé. Cliquez sur le lien d'activation contenu dans cet email pour valider votre compte.</p>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Connexion</button></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>



    </div>








<!-- Div gestion du mot de passe perdu -->

<div class="panel-body" style="display: none;" id="form-mpoublie">
      <h4 class="">
        Mot de passe perdu?
      </h4>
       <form name="formMp" id="formMp" class="form-horizontal" enctype="multipart/form-data" method="POST" >




          <span class="help-block">
             <span class="help-block">
            Entrer l'adresse email utilisee pour vous connecter
            <br>
          </span>


         <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                          <input id="id" type="text" class="form-control" name="email" required placeholder="email">                                        
          </div>
          
          

          <p class="help-block">
              <a  href="#" id="retourCnx"><small><i class="glyphicon glyphicon-arrow-left"></i> Connexion</small></a>
          </p>

          <!-- Button -->
                          <div class="col-sm-12 controls">
                              <button type="submit" href="#" class="btn btn-primary pull-right"  name="connexion"><i class="glyphicon glyphicon-ok"></i> Evnoyer</button>
                               <div>

      </form>
    </div>








      </div>
          </div>  

  </div>



    

      
      
      
    
  	
      
      


  </body></html>