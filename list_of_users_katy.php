<!DOCTYPE html>
<html>
	<head>
		<style>
			p {
 				text-align:center
			}
		</style>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body>
		<?php 
			include_once './mypage.php'; 
			include_once './database.php'; 
			session_start();

			echo "<p>Users of Katy.Co.</p> ";
			echo "<br/>";

			$result = searchAll();
		
			while($row = mysqli_fetch_row($result)) {
				echo "<p>";
				foreach ($row as $column) {
					echo $column." ";        			
				}
				echo "</p>";
			}
		?>

	</body>
</html>