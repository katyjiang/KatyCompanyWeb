<!DOCTYPE html>
<html>
	<head>
		<title>Katy_Dreamer.Co</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>
	
	<body>
		<?php 
			include_once './mypage.php'; 
			include_once './database.php'; 
			session_start(); 
			renderHeader();

			if (isset($_COOKIE['product'])){
				$product_array = json_decode($_COOKIE['product'], true);
				echo "<p>Last five products you visited (ordered from oldest to latest)</p>";
				foreach ($product_array as $key => $value) {
					echo "<p>".$key."  ".$value."</p>";
				}
			}
	 	?>

	</body>
</html>

