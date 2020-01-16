<!DOCTYPE html>
<html>
  <head>
    <title>Facebook Login JavaScript Example</title>
    <meta charset="UTF-8">
  </head>

  <body>
    <script>

      function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response);                   // The current login status of the person.
        if (response.status === 'connected') {   // Logged into your webpage and Facebook.
          FB.logout(function(response){
            document.getElementById('status').innerHTML = 'You have successfully logged out.';
            //var url= "https://localhost:443/index.php?logout=true";
            var url= "https://www.katyjiang.com/index.php?logout=true";
            window.location = url; 
          }); 
        } else {                                 // Not logged into your webpage or we are unable to tell.
          document.getElementById('status').innerHTML = 'You have logged out.';
        }
      }


      function checkLoginState() {               // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function(response) {   // See the onlogin handler
          statusChangeCallback(response);
        });
      }


      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1024284464617987',
          cookie     : true,                     // Enable cookies to allow the server to access the session.
          xfbml      : true,                     // Parse social plugins on this webpage.
          version    : 'v5.0'           // Use this Graph API version for this call.
        });


        FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
          if (response.status === 'connected') {   // Logged into your webpage and Facebook.
            FB.logout(function(response)  {
              document.getElementById('status').innerHTML = 'You have successfully logged out.';
              //var url= "https://localhost:443/index.php?logout=true"; 
              var url= "https://www.katyjiang.com/index.php?logout=true"; 
              window.location = url; 
            }); 
          }
        });
      };

  
      (function(d, s, id) {                      // Load the SDK asynchronously
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

    </script>

<!--<fb:login-button scope="public_profile, email" onlogin="checkLoginState();">
</fb:login-button>-->

    <div id="status">
    </div>
  </body>
  
</html>