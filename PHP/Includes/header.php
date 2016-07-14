<?
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Espace Administrateur</title>
<link rel="stylesheet" type="text/css" href="./../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./../css/style.css">
<link rel="stylesheet" type="text/css" href="./../css/style2.css"/>
<link rel="stylesheet" type="text/css" href="../css/header.css">
<style>
  div         {margin: 20px; font-family: Helvetica, sans-serif; font-size:16px; color:#DCDCDC; }
  .ausu-suggest {width: 280px;}
  #wrapper    {margin-left: auto; position: relative; margin-right: auto; margin-top:10px ;width:  850px;}
  h3          {font-size: 11px; text-align: center;}
  span        {font-size: 11px; font-weight: bold;}
  a:link      {color: #F06;text-decoration: none;}
  a:visited   {text-decoration: none;color: #F06;}
  a:hover     {color: #09F;}
  a:active    {text-decoration: none;color: #09F;}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.ausu-autosuggest.js"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: './data.php'
    });
});

// pour emettre une formulaire sans changer de page 
$(document).ready(function(){

$("#myform").validate({
submitHandler: function(form) {

$.post('data.php', $("#myform").serialize(), function(data) {
//$('#results').html(data);
});
}
});
});

function remplire(){
  lenom=document.getElementById("nom").value;
  document.getElementById('monnom').value=lenom ;
  document.getElementById('submit').click(); // clicker automatiquement sur submit pour emettre le formulaire   
}
</script>

 <!-- pour le bouton de header --> 


              
   <script type="text/javascript" src="//d36xtkk24g8jdx.cloudfront.net/bluebar/b0cc1d6/scripts/bluebar.js"></script>

<!-- formulaire utilisé pour recuperer le champ nom (ou prenom, fonction )saisie -->


</head>
<body >
  <header style=" margin: 0px 0px 80px 0px;">


<!--menu profil-->
         
         <div class="top-bar">
                <div class="account-state">
                    <ul class="actions">    
                        <li id="link_profile" class="link-profile has-dropdown">
                            <a href="javascript:;">  
    <span class="img img-outset current-user-avatar" style="background-image: url(./../img/reg.png);">
        <img src="./../img/reg.png" onerror="imageFallback(this);" alt="">
        <b></b>
    </span>
                            </a>
                            <div class="dropdown">
                                <i></i>
                                <ul>
                                    <li><a href="./profile.php">Profil</a></li>
                                    <li><a href="./logout.php">Deconnexion</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

<!--fin menu profil-->


  <div id="header_container">
  
      <h2>Projet DSIC</h2>
    </div>
  </ul>

    
  </header>
<?

?>



