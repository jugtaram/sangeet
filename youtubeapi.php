
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
body{
	background-color: white;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:red;border-color: pink;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="profile.php" style="font-family:fantasy;font-size:30px;color:white" title="sangeet.com"><span class="glyphicon glyphicon-headphones" >Sangeet</span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <form class="navbar-form navbar-left" id="searchtool" style="width:parent;">
        <div class="input-group input-group-lg" style="margin-left: 50%">
                     <input id="search" type="text" class="form-control" placeholder="SEARCH&hellip;&#x266B;&#x266B;&#x266B;">
                  
           </div>
      </form>
    </div>
  </div>
</nav>
   <div id="result" style="margin-left:200px;margin-top:200px" ></div>
<script>

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
    $("#search").on("keyup",function(e){
              e.preventDefault();
              
              var request=gapi.client.youtube.search.list({
                     part:"snippet",
                     type:"video",
                     q: encodeURIComponent($("#search").val()).replace(/%20/g,"+"),
                     maxResults:10,
                     
                     order:"viewCount",
                     publishedAfter:"1950-01-01T00:00:00Z",
              });
              //execuate request
              request.execute(function(response){
                       $("#result").html(" ");
                     var results=response.result;
                     $.each(results.items,function(index,item){
                               $.get("item.html",function(data){
                                 $("#result").append(tplawesome(data,[{"title":item.snippet.title,"videoid":item.id.videoId}]));
                               });
                    
                     });
                    
              });
    });
   


  });

  function init()
  {
      gapi.client.setApiKey("key");
      gapi.client.load("youtube","v3",function(){
               //api is ready now
      });
  }
  </script>
  <script src="https://apis.google.com/js/client.js?onload=init"></script>
</body>
</html>
