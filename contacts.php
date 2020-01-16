<!DOCTYPE html>
<html>
	<head>
		<title>Contacts</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>
	
	<body>
		
		<?php 
			include_once './mypage.php'; 
			session_start(); 
			renderHeader(); 
			renderRegisterLogin();

		?>

		<?php 
			$myfile = fopen("contacts.txt", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("contacts.txt")); fclose($myfile);
		?>

	</body>

</html>
