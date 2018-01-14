<?php
session_start();
require("funs.php");
$userid=$_SESSION['id'];
$con=con();
$qry="SELECT * FROM user WHERE user.uid='$userid'";
$result=$con->query($qry);
$arr=$result->fetch_array();
$name=$arr['uname'];
$email=$arr['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>music world</title>
  <meta charset="UTF-8">
  <meta name="author" content="jugta ram">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="shortcut icon" type="image/x-icon" href="onebit_40.ico" /> 
  
	<style>
	</style>
	</head>
	<body style="background: url(userbg.jpg);">
  <?php require 'navbar.php';?>

  <script>
  $("#searchtool").css("display","none");
  $(".navbar").css("position","relative");

let ff=`<li id="userpage"><a class="group" href="profilephoto.php" target="_top" ><span class="glyphicon glyphicon-user"></span>hello <?php echo " $name" ?></a>
    </li>

    <li id="logout"><a class="group" href="/sangeet/logout.php" data-toggle="modal" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>`

$("#changeable").html(" "+ff);
 
</script>

  <div class="container-fluid" style="position: relative;box-sizing: content-box;"> 
    <img src="User.ico" style="float: left;height: 150px;margin-left:30%; ">
    
    <div class="userinfo" style="float: left;margin-left:20px;position: relative;">
        <h2 style="color: white;"><?php echo "$name" ?></h2>
        <br>
        
    </div>
  </div>

<nav class="navbar navbar-inverse" style="position: relative;margin-top:10px;background:url(userbg.jpg);border-color: pink;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="profilephoto.php">hello <?php echo "$name" ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#" id="play">Playlist</a></li>
        <li><a href="#" id="lik">Liked</a></li>
        <li><a href="#" id="foll">Following</a></li>
      </ul>
     
    </div>
  </div>
</nav>

<div id="reslik"></div>	
<div id="fer"></div>


<script>


$("#foll").on("click",function(){
   $("#reslik").html(" ");
     $.post("follow1.php",function(result){
                $("#reslik").html(result);
        
        $(".ast").on("click",function(){
                 $.post("artists.php",{name:$(this).attr("st")},function(result){
                  $("#reslik").html(" ");
                  $("#reslik").html(result);

  });
      });

     });
 });

$("#play").on("click",function(){
  $("#reslik").html(" ");
   
   $.post("playlist1.php",function(result){
              $("#reslik").html(result);


              function tplawesome(template, data) {
  // initiate the result to the basic template
  res = template;
  // for each data key, replace the content of the brackets with the data
  for(var i = 0; i < data.length; i++) {
    res = res.replace(/\{\{(.*?)\}\}/g, function(match, j) { // some magic regex
      return data[i][j];
    })
  }
  return res;
} // and that's it!
  $(function(){
    $(".youtube").on("click",function(e){
              e.preventDefault();
              alert($(this).attr("tt"));
              //prepare request
              pd=$(this);
              var request=gapi.client.youtube.search.list({
                     part:"snippet",
                     type:"video",
                     q: encodeURIComponent($(this).attr("tt")).replace(/%20/g,"+"),
                     maxResults:1,
                     
                     order:"viewCount",
                     publishedAfter:"1950-01-01T00:00:00Z",
              });
              //execuate request
              request.execute(function(response){
                     var results=response.result;
                     $.each(results.items,function(index,item){
                        
                               $.get("youtubeembedsupport.html",function(data){
                                 $(pd).append(tplawesome(data,[{"title":item.snippet.title,"videoid":item.id.videoId}]));
                               });
                     });
                    
              });
         
   
 });
    $(".dell").on("click",function(){
        psf=$(this);
    $.post("deleteplaylist.php",{song:$(this).attr("tttt")},function(result){
      $(psf).html("deleted");
      
    });
  });
});

  });
       });
  
   



$("#lik").on("click",function(){
   $("#reslik").html(" ");
  
    $.post("like1.php",function(result){
               $("#reslik").html(result);
 
function tplawesome(template, data) {
  // initiate the result to the basic template
  res = template;
  // for each data key, replace the content of the brackets with the data
  for(var i = 0; i < data.length; i++) {
    res = res.replace(/\{\{(.*?)\}\}/g, function(match, j) { // some magic regex
      return data[i][j];
    })
  }
  return res;
} // and that's it!
  $(function(){
    $(".youtube").on("click",function(e){
              e.preventDefault();
              //prepare request
              pd=$(this);
              var request=gapi.client.youtube.search.list({
                     part:"snippet",
                     type:"video",
                     q: encodeURIComponent($(this).attr("tt")).replace(/%20/g,"+"),
                     maxResults:1,
                     
                     order:"viewCount",
                     publishedAfter:"1950-01-01T00:00:00Z",
              });
              //execuate request
              request.execute(function(response){
                     var results=response.result;
                     $.each(results.items,function(index,item){
                               $.get("youtubeembedsupport.html",function(data){
                                 $(pd).append(tplawesome(data,[{"title":item.snippet.title,"videoid":item.id.videoId}]));
                               });
                     });
                    
              });
    });
   
});
});

  });


 
  function init()
  {
      gapi.client.setApiKey("AIzaSyAxbBrvtR3yi-nvgBoffImP4q83_sDbmsc");
      gapi.client.load("youtube","v3",function(){
               //api is ready now
      });
  }
 
  </script>
 
 <script src="https://apis.google.com/js/client.js?onload=init"></script>
</body>
</html>
