<!DOCTYPE html>
<html>
	<head>
		<title>Users and Partners</title>
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
			echo "<p>Users of PAYAYA.</p> ";
		    echo "<br/>";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://www.findyakun.com/my_user.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = curl_exec ($ch);
			echo $contents;
			echo "<br/>";
			curl_close ($ch);
			echo "<p>Users of ElderMotion.</p> ";
	    	echo "<br/>";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://eldermotion.com/my_users.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = curl_exec ($ch);
			echo $contents;
			echo "<br/>";
			curl_close ($ch);
		?>
	</body>
</html>