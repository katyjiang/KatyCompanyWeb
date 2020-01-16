<!DOCTYPE html>
<html>
	<head>
		<title>Our Story</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body bgcolor="white">
		
		<?php 
			include_once './mypage.php'; 
			session_start(); 
			renderHeader(); 
			renderRegisterLogin();
		?>
		<p align="center">The Story About Us.</p>
		<img style="display: block; margin-left: auto; margin-right: auto;" src="./images/about.JPG" width="40%" height="40%"/> 
	</body>
</html>
