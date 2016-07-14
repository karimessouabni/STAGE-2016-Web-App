<? 

?>

<!DOCTYPE html>
<html >
  <head>



    <meta charset="UTF-8">
    <title>Basic Usage</title>

      <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    
    
    <link rel='stylesheet prefetch' href='https://cdn.gitcdn.link/cdn/angular/bower-material/v1.1.0-rc.5/angular-material.css'>
<link rel='stylesheet prefetch' href='https://material.angularjs.org/1.1.0-rc.5/docs.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
  <style type="text/css">
    body{
      background-attachment: fixed; 
      font-family: 'Open Sans', sans-serif;
    }


      .dropdown-toggle{
         width : 57px !important;
         height: 34px;
      }

      .glyphicon-remove, .glyphicon-trash {
         color: #ff0c05;
      }

      .glyphicon-pencil{
         color: #14ba1f;
      }

      .glyphicon-plus{
         color : #428bca
      }

   </style>
    
  </head>

  <body>

    <div ng-controller="AppCtrl" class="md-padding dialogdemoBasicUsage" id="popupContainer" ng-cloak="" ng-app="MyApp">

  <div class="dialog-demo-content" layout="row" layout-wrap="" layout-margin="" layout-align="center">
    <md-button class="md-primary md-raised" ng-click="showConfirm($event)">
      Confirm Dialog
    </md-button>
  <div ng-if="status" id="status">
    <b layout="row" layout-align="center center" class="md-padding">
      {{status}}
    </b>
  </div>
</div>





 <div id="toolbar" class="btn-group">
      <button id="buttonP" class="btn btn-default">
        <i class="glyphicon glyphicon-plus"></i>&nbsp;Afficher plus d'infos
      </button>

      <button type="button" id="buttonE" class="btn btn-default">
       <i class="glyphicon glyphicon-pencil"></i>&nbsp;Editer
    </button>

    <button type="button" id="buttonS"  class="btn btn-default">
       <i class="glyphicon glyphicon-trash"></i>&nbsp;Supprimer
    </button>

 </div>

 <table id="table" data-toggle="table"
 data-url="./bDtoAllProjects"
 data-side-pagination="server"
 data-pagination="true"
 data-height="500" 
 data-search="true"
 data-show-refresh="true"
 data-show-toggle="true"
 data-show-columns="true"
 data-toolbar="#toolbar"
 data-click-to-select="true"
  data-page-list="[5, 10, 20, 50, 100, 200]"
 >
 <thead>
  <tr>
    
    <th data-field="identifiant" data-sortable="true" data-switchable="false">identifiant</th>
    <th data-field="intitule" data-sortable="true" data-sorter="alphanum" >intitule</th>
    <!-- <th data-field="2" >reference</th> -->
    <th data-field="superficie" >Superficie du terrain</th>
    <!-- <th data-field="4" data-sortable="true">objectif</th> -->
    <!-- <th data-field="5" data-sortable="true" data-sorter="alphanum">consistance</th> -->
    <th data-field="cout" data-visible="false"  data-sortable="true">cout</th>
    <!-- <th data-field="7" data-visible="false"  data-sortable="true">maitre</th> -->
    <!-- <th data-field="8" data-visible="false"  data-sortable="true">naturem</th> -->
    <th data-field="taux" data-visible="false"  data-sortable="true">taux</th>
    <!-- <th data-field="commune" data-visible="false"  data-sortable="true">commune</th> -->
    <!-- <th data-field="situation" data-visible="false"  data-sortable="true">situation</th> -->
    <!-- <th data-field="intervention" data-visible="false"  data-sortable="true">intervention</th> -->
    <!-- <th data-field="13" data-visible="false"  data-sortable="true">naturet</th> -->
    <!-- <th data-field="statut" data-visible="false"  data-sortable="true">statut</th> -->
    <th data-field="convention"  data-visible="false"  data-sortable="true">convention</th>
    <!-- <th data-field="16" data-visible="false"  data-sortable="true">remarques</th> -->
    <th data-field="action" data-align ="center" data-formatter="actionFormatter" data-events="actionEvents">Modifier/Supprimer</th>

 </tr>
</thead>
</table>


<!--
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
-->
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/svg-assets-cache.js'></script>
<script src='https://cdn.gitcdn.link/cdn/angular/bower-material/v1.1.0-rc.5/angular-material.js'></script>

        <!-- <script src="js/index.js"></script> -->

        <script type="text/javascript">




      angular.module('MyApp',['ngMaterial', 'ngMessages', 'material.svgAssetsCache'])

.controller('AppCtrl', function($scope, $mdDialog, $mdMedia) {
  $scope.status = '  jj';
  $scope.customFullscreen = $mdMedia('xs') || $mdMedia('sm');



  $scope.showConfirm = function(ev) {
    // Appending dialog to document.body to cover sidenav in docs app
    var confirm = $mdDialog.confirm()
          .title('Would you like to delete your debt?')
          .textContent('All of the banks have agreed to forgive you your debts.')
          .ariaLabel('Lucky day')
          .targetEvent(ev)
          .ok('Please do it!')
          .cancel('Sounds like a scam');

    $mdDialog.show(confirm).then(function() {
      $scope.status = 'You decided to get rid of your debt.';
    }, function() {
      $scope.status = 'You decided to keep your debt.';
    });
  };

  




});

function DialogController($scope, $mdDialog) {
  $scope.hide = function() {
    $mdDialog.hide();
  };

  $scope.cancel = function() {
    $mdDialog.cancel();
  };

  $scope.answer = function(answer) {
    $mdDialog.hide(answer);
  };
}




function actionFormatter(value, row, index) {
    return [
        '<a class="edit ml10" href="javascript:void(0)" title="Editer">',
        '<i class="glyphicon glyphicon-plus"></i>',
        '</a>&nbsp;&nbsp;&nbsp;',
        '<a class="edit ml10" href="javascript:void(0)" title="Editer">',
        '<i class="glyphicon glyphicon-pencil"></i>',
        '</a>&nbsp;&nbsp;&nbsp;',
        '<a class="remove ml10" href="javascript:void(0)" title="Supprimer">',
        '<i class="glyphicon glyphicon-trash"></i>',
        '</a>'
    ].join('');
}

window.actionEvents = {
    'click .like': function (e, value, row, index) {
        alert('You click like icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);
    },
    'click .edit': function (e, value, row, index) {
        alert('You click edit icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);
    },
    'click .remove': function (e, value, row, index) {
        alert('You click remove icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);
    }
};

    </script>

    
  </body>
</html>
