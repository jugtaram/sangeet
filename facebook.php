
<script>

  window.fbAsyncInit = function() {
    FB.init({
      appId            : 'app id',
     
      cookie           : true,
      xfbml            : true,
      version          : 'v2.10'
    });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
};
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  function statusChangeCallback(response)
  {
    if(response.status==='connected')
    {
      console.log("logged in success fully");
      testfun();
      log=1;
      //window.location.assign("profile.php");
     
      }
        
    else
    {

      console.log("unauthorized user");
      log=0;
     
    }
  };

  function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
};


function logout()
{
  FB.logout(function(response)
  {
    
  });
};
function testfun()
{
    
  FB.api('/me?fields=name,email',function(response1){
    direct1(response1);

  });
 // FB.api('/me/feed',function(response){
  //  if(response&& !response.error)
  // direct2(response);
 // alert(JSON.stringify(response));
 // });
};

function direct1(response1){
  //window.location.assign("profile.php");
  
  
  alert(response1.name);

  //window.location.assign("profile.php");}

}
/*function direct2(response){
  //window.location.assign("profile.php");
  var mes=" ";
  for(i in response.data){
if(response.data[i].message)
  mes+=response.data[i].message;}
  
alert(mes);
}*/
  </script>
  <fb:login-button   scope="public_profile,email,user_posts" onlogin="checkLoginState();">LOG IN WITH FACEBOOK
</fb:login-button>
