<script type="text/javascript">    
function fblogout() {    
          FB.logout(function () {    
     window.location.reload(); });    
    }    
      window.fbAsyncInit = function() {    
        FB.init({    
          appId   : '<?php echo $facebook->getAppId(); ?>',    
          session : <?php echo json_encode($session); ?>,    
          status  : true,    
          cookie  : true,    
          xfbml   : true    
        });    

        FB.Event.subscribe('auth.login', function() {    
          window.location.reload();    
        });    
      };    

      (function() {    
        var e = document.createElement('script');    
        e.src = document.location.protocol + '//connect.facebook.net/fr_FR/all.js';    
        e.async = true;    
        document.getElementById('fb-root').appendChild(e);    
      }());    
          //your fb login function    
          function fblogin() {    
     FB.login(function(response) {    
              //...    
            }, {perms:'read_stream,publish_stream,offline_access'});    
   redir();    
          }    
        </script>