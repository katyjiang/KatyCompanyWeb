<html>
  <head>
    <title>Account</title>
    <link rel="stylesheet" href="./css/bare/css/bare.min.css" />
    <style>
      .flex-container {
        display: flex;
        width: 1000px;
        margin: auto;
      }

      .flex-container>div {
        width: 200px;
        margin: 1px;
        text-align: center;
        line-height: 10px;
      }
    </style>
  </head>

  <body>

    <?php 
    	include_once './mypage.php';
    	include_once './database.php'; 
    	include_once './rating.php'; 
    	include_once './comments_detail.php';
      include_once './config.php';
    		
      session_start(); 
    	renderHeader(); 
    	renderRegisterLogin();
    	if(isset($_SESSION['valid_user_email'])) {
        $history = get_last_five_visit($_SESSION['valid_user_email']);
      }
        
      echo "<h2 style=\"text-align:center\">Recently Viewed</h2>";
      echo "<div class=\"flex-container\">";
      foreach($history as $column) {
        echo "<div>";
        echo "<p>";
        echo $column['product_name'];
        echo "</p>";
        $a = PUBLIC_IMAGE_FOLDER; 
      	$b = $column['product_image']; 
      	$c = $a.$b;        	        	
      	echo "<img src='$c' width='200' height='200' class='center'>";
        echo "</div>";
      }
      echo "</div>";
    ?>
  </body>
</html>