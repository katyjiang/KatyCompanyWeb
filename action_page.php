<!DOCTYPE html>
<html>
	<head>
		<title>Katy_Dreamer.Co</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body bgcolor="pink">
		
		<?php 	
			session_start();
			$myfile = fopen("customer.txt", "r") or die("Unable to open file!");

			$found = false;

			while(!feof($myfile))
			{
  				$line = fgets($myfile);
  				$uname_password = explode (",", $line);

  				if (trim($_POST['uname'])===trim($uname_password[0]) && trim($_POST['psw']) === trim($uname_password[1])) {
  					echo '<p>Hello ' . htmlspecialchars($_POST["uname"]) . '!</p>';
  					$found = true;
  					break;
  				} 
  			}

  			if(!$found || trim($_POST['psw'])!=trim($uname_password[1])){
				header("Location: http://www.katyjiang.com/login.php"); /* Redirect browser */
  				exit();
			}

 			fclose($myfile);
 		?>
	</body>
</html>
