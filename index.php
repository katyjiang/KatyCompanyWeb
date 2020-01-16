<!DOCTYPE html>
<html>
	<head>
		<title>Katy_Dreamer.Co</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bare/css/bare.min.css" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>

    <?php 
      include_once './mypage.php'; 
      include_once './database.php';
      session_start();
      
      if(isset($_GET['email'])){
        $_SESSION['valid_user_email'] = $_GET['email'];
      }
      if(isset($_GET['logout'])){
        unset($_SESSION['valid_user_email']);
      }
      renderHeader(); 
      renderRegisterLogin();
    ?>

	<body>
		<div class="container">
  			<div id="myCarousel" class="carousel slide" data-ride="carousel">
    			<!-- Indicators -->
    			<ol class="carousel-indicators">
      				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      				<li data-target="#myCarousel" data-slide-to="1"></li>
      				<li data-target="#myCarousel" data-slide-to="2"></li>
   				</ol>

    			<!-- Wrapper for slides -->
   				<div class="carousel-inner">
      				<div class="item active">
        				<img src="./images/cookies.JPG" alt="Signatrue Cookies" style="width:100%;">
      				</div>

      				<div class="item">
        				<img src="./images/xuehua.JPG" alt="Snow Flake Pastry" style="width:100%">
      				</div>
              
              <div class="item">
        				<img src="./images/shunde.JPG" alt="Shun-De set" style="width:100%">
      				</div>
    			</div>

    			<!-- Left and right controls -->
    			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      				<span class="glyphicon glyphicon-chevron-left"></span>
      				<span class="sr-only">Previous</span>
    			</a>
    			<a class="right carousel-control" href="#myCarousel" data-slide="next">
      				<span class="glyphicon glyphicon-chevron-right"></span>
      				<span class="sr-only">Next</span>
   				</a>
  			</div>
		</div>

	</body>

</html>
