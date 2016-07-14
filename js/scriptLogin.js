$('document').ready(function()
{ 



    // ------------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------ Verification forms ---------------------------------------------------- 
    // ------------------------------------------------------------------------------------------------------------------------------


    /* validation  formulaire de connexion */
    $("#form").validate({
     errorClass: "alert alert-danger", 
     errorElement: "i",
    wrapper: "div",  // a wrapper around the error message

    rules:
    {
     mp: {
      required: true,
    },
    email: {
      required: true,
      email: true
    },
  },


  messages:
  {

    mp:{
     required: "mot de passe non fournie",
   },
   email: "Adresse email incorrecte ! ",
 },
 submitHandler: submitForm 
});  
    


    /* validation  formulaire d'inscription */



    $("#form-ins").validate({
     errorClass: "alert alert-danger", 
     errorElement: "i",
    wrapper: "div",  // a wrapper around the error message

    rules:
    {

     pwd: {
       required: true,
       minlength: 5
     },

     pwdconf:{
      required: true,
      minlength: 5,
      equalTo : "#pwd",
    },

    email: {
      required: true,
      email: true
    },

    emailconf:{
     equalTo : "#email",
   },
   
 },


 messages:
 {



  pwd:{
   required: "mot de passe non fournie",
   minlength: "5 caractères minimum"
 },
 email: "Adresse email incorrecte ",
 emailconf: "Confirmation de l'email incorrecte ",
 pwdconf: "Confirmation du mot de passe incorrecte ",
},


submitHandler: false 
});  
    /* validation */
    
    







    /* validation  formulaire d'ajout de projet */


    $("#form-add-projet").validate({
     errorClass: "alert alert-danger", 
     errorElement: "i",
     wrapper: "div",  // a wrapper around the error message

     rules:
     { 
       identifiant: {
        required: true,
      },

      cout: {
        required: true,
        number: true
      },

     // taux: {
     //  required: true,
     //  number: true
     // },

     superficie: {
      required: true,
      number: true
    },

   
   },


   messages:
   {
    identifiant: "Identifiant du projet non fourni ! ",
    cout: "cout necessaire ! ",
    superficie: "superficie necessaire! ",
            // int: "Intitulé du projet non fourni ! ",
          },


          submitHandler: submitFormAddProj 
        });  


    




    /* validation  formulaire de modification de projet */


    $("#form-modify-projet").validate({
     errorClass: "alert alert-danger", 
     errorElement: "i",
     wrapper: "div",  // a wrapper around the error message

     rules:
     { 
       identifiant: {
        required: true,
      },

      cout: {
        required: true,
        number: true
      },

     // taux: {
     //  required: true,
     //  number: true
     // },

     superficie: {
      required: true,
      number: true
    },

     // int:{
     //  required: true,
     // },

   },


   messages:
   {
    identifiant: "Identifiant du projet non fourni ! ",
    cout: "FAUX! ",
    superficie: "superficie necessaire! ",
            // int: "Intitulé du projet non fourni ! ",
          },


          submitHandler: submitFormModifyProj 
        });  






   //  /* validation  formulaire d'ajout de partenaire */


   //  $("#form-add-partenaire").validate({
   //   errorClass: "alert alert-danger", 
   //   errorElement: "i",
   //   wrapper: "div",  // a wrapper around the error message

   //   rules:
   //   { 
   //     nom: {
   //      required: true,
   //    },

   //    SommeV: {
   //      required: true,
   //      number: true
   //    },

   //     SommeT: {
   //      required: true,
   //      number: true
   //    },

   
   // },


   // messages:
   // {
   //  nom: "nom du partenaire non fourni ! ",
   //  SommeV: "Somme versée necessaire ! ",
   //  SommeV: "Somme totale necessaire! ",
   //        },


   //        submitHandler: submitFormAddPartenaire 
   //      });  





    // ------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------  submit Data -------------------------------------------------------- 
    // ------------------------------------------------------------------------------------------------------------------------------





    /* login submit */
    function submitForm()
    {  
     var data = $("#form").serialize();
     
     $.ajax({

       type : 'POST',
       url  : '../PHP/loginAjax.php',
       data : data,
       beforeSend: function()
       { 
        $("#error").fadeOut();
        $("#btn-connexion").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi ...');
      },
      success :  function(response)
      {      
       if(response=="connected"){
        $("#btn-connexion").html('<span class="glyphicon glyphicon-transfer"></span>&nbsp; Connexion en cours ...');
        $("#imgload").html('<img src="../images/load.gif" style="padding-left: 278px !important;" />');
      setTimeout('window.location.href = "../PHP/home.php"; ',2000); // redirection vers Home
    }
    else{
      $("#error").fadeIn(0, function(){     
        $("#error").html('<div class="alert alert-danger"> <i class="glyphicon glyphicon-info-sign"></i> &nbsp; Email ou mot de passe erroné !</div>');
        $("#btn-connexion").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Connexion');
      });
      $(".container").effect( "shake", { direction: "right", times: 2, distance: 20}, 500 );
    }
  }
});
     return false;
   }








   /* Ajout d'un nouveau projet -> submit */
   function submitFormAddProj()
   {  
     var data = $("#form-add-projet").serialize();
     
     $.ajax({

       type : 'POST',
       url  : '../PHP/projetToBd.php',
       data : data,
       beforeSend: function()
       { 
    // $("#error").fadeOut();
    // $("#btn-connexion").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi ...');
  },
  success : function(response)
  {
   if( response == "Yes") {


    $('#addForm').modal('hide');
    $('.modal-backdrop').hide();
                     // $('#myModal').modal({ backdrop: 'static', keyboard: true }) // afficher le modal de fin de modification
                     // Notification 
                    $('.bottom-right').notify({
                      message: { text: "Projet ajouté avec succès !" },
                      type: "blackgloss",
                      closable : true,
                      fadeOut: {
                        delay: 3500
                      }
                    }).show(); 
                    // Notification 
                  var $table = $('#table');
                  refreshTable($table);

                   }
                   else {

    // $('#addForm').modal('hide');
    // $('.modal-backdrop').hide();
                     // $('#myModal').modal({ backdrop: 'static', keyboard: true }) // afficher le modal de fin de modification

                     alert(response);
                   }  

                   if(response.success) {
                    // alert(response);
                    alert("popo");
                  }

                }
              });
     return false;
   }







   /* Modification d'un nouveau projet -> submit */
   function submitFormModifyProj()
   {  
     var data = $("#form-modify-projet").serialize();
     
     $.ajax({

       type : 'POST',
       url  : '../PHP/modifyPtoBd.php',
       data : data,
       beforeSend: function()
       { 
    // $("#error").fadeOut();
    // $("#btn-connexion").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi ...');
  },
  success : function(response)
  {
   if( response['error'] == false) {
   }
   else {
    $('#editForm').modal('hide');
    $('.modal-backdrop').hide();


                // Notification 
                $('.bottom-right').notify({
                  message: { text: "Modifications enregistrées !" },
                  type: "blackgloss",
                  closable : true,
                  fadeOut: {
                    delay: 3500
                  }
                }).show(); 
                    // Notification 
                     var $table = $('#table');
                    refreshTable($table);
                   }  

                   if(response.success) {
                    alert(response);


                  }
/*
     if(response=="connected"){
      $("#button1s").html('<span class="glyphicon glyphicon-transfer"></span>&nbsp; Envoi en cours ...');
      $("#imgload1").html('<img src="../images/load.gif" style="padding-left: 278px !important;" />');
      // setTimeout('window.location.href = "../PHP/home.php"; ',2000); // redirection vers Home

      setTimeout( function(){ 
            $('#contenu').load('addProjet.php');
      }  , 1000 );

     }
     else{     
      alert("Vous etes deconnecter !");
      setTimeout('window.location.href = "../PHP/accueil.php"; ',10); // redirection vers Home

     }


     */
   }
 });
     return false;
   }


/* Ajout d'un nouveau partenaire -> submit */
  //  function submitFormAddProj()
  //  {  
  //    var data = $("#form-add-partenaire").serialize();
     
  //    $.ajax({

  //      type : 'POST',
  //      url  : '../PHP/partenaireToBd.php',
  //      data : data,
  //      beforeSend: function()
  //      { 
  //   // $("#error").fadeOut();
  //   // $("#btn-connexion").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Envoi ...');
  // },
  // success : function(response)
  // {
  //  if( response == "Yes") {


  //   $('#addForm').modal('hide');
  //   $('.modal-backdrop').hide();
  //                    // $('#myModal').modal({ backdrop: 'static', keyboard: true }) // afficher le modal de fin de modification
  //                    // Notification 
  //                   $('.bottom-right').notify({
  //                     message: { text: "Projet ajouté avec succès !" },
  //                     type: "blackgloss",
  //                     closable : true,
  //                     fadeOut: {
  //                       delay: 3500
  //                     }
  //                   }).show(); 
  //                   // Notification 
  //                 var $table = $('#table');
  //                 refreshTable($table);

  //                  }
  //                  else {

  //   // $('#addForm').modal('hide');
  //   // $('.modal-backdrop').hide();
  //                    // $('#myModal').modal({ backdrop: 'static', keyboard: true }) // afficher le modal de fin de modification

  //                    alert(response);
  //                  }  

  //                  if(response.success) {
  //                   // alert(response);
  //                   alert("popo");
  //                 }

  //               }
  //             });
  //    return false;
  //  }




 });





