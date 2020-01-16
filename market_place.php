<!DOCTYPE html>
<html>
	<head>
		<title>Our Friends</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>
	
	<body bgcolor="white">
		<?php 
			include_once './mypage.php'; 
			session_start();
			marketTop();
			renderRegisterLogin();
		?>
		
		<h2 align="center">Welcome To Our Market Place.</h2>
		<p align="center"><a href = "https://www.findyakun.com">Payaya Yoga</a></p>
		<p align="center"><a href= "https://eldermotion.com/">Elder Motion</a></p>
		<p align="center"><a href= "https://xjyaoproject.com/project/">Top Spin</a></p>
		<p align="center"><a href= "https://www.hjyproject.com/">Meow Cafe</a></p>

		
	</body>
</html>
