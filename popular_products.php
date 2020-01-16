<html>
  <head>
    <title>Popular Products</title>
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

      $most = get_most_visit();
      echo "<h2 align='center'>Most customers Viewed</h2>";
      echo "<div class=\"flex-container\">";
      foreach($most as $column) {
        echo "<div>";
        echo "<p align='center'>";
        echo $column['product_name'];
        echo "</p>";
        $a = PUBLIC_IMAGE_FOLDER; 
    		$b = $column['product_image']; 
        $c = $a.$b;        	        	
    		echo "<img align='middle' src='$c' width='200' height='200' class='center'>";
        echo "</div>";
      }
      echo "</div>";

      $highRate = get_high_score();
      echo "<br/><br/><br/><br/>";
      echo "<h2 align='center'>High Rated Top 5</h2>";
      echo "<div class=\"flex-container\">";
      foreach($highRate as $value) {
        echo "<div>";
        echo "<p align='center'>";
        echo $value['product_name'];
        echo "</p>";
        $a = PUBLIC_IMAGE_FOLDER; 
        $b = $value['product_image']; 
        $c = $a.$b;                   
        echo "<img align='middle' src='$c' width='200' height='200' class='center'>";
        echo "</div>";
      }
      echo "</div>";
    ?>

  </body>
</html>