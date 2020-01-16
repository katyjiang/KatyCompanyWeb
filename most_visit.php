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

			if (isset($_COOKIE['most_visit'])){
				$most_visit = json_decode($_COOKIE['most_visit'], true);
				arsort($most_visit);
				$count = 0; 
				foreach ($most_visit as $key => $value) {
					if ($value == 1) {
						echo "<p>You visit ".$key."  ".$value." time.</p>";
					}
					else {
						echo "<p>You visit ".$key."  ".$value." times.</p>";
					}
					$count++;
					if($count>=5)break;
				}
			}
		?>
	</body>
</html>
