<!DOCTYPE html>
<html>
	<head>
		<title>Katy_Dreamer.Co</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>	

	<body bgcolor="pink">
		
		<?php 
			include_once './database.php';
			session_start();

			$firstName = "";
			$lastName = "";
			$email = "";
			$homeAddress = "";
			$homePhone = "";
			$cellPhone = "";

			if (isset($_POST['first_name'])) {
				$firstName = trim($_POST['first_name']);
			}

			if (isset($_POST['last_name'])) {
				$lastName = trim($_POST['last_name']);
			}

			if (isset($_POST['email'])) {
				$email = trim($_POST['email']);
			}

			if (isset($_POST['home_address'])) {
				$homeAddress = trim($_POST['home_address']);
			}

			if (isset($_POST['home_phone'])) {
				$homePhone = trim($_POST['home_phone']);
			}

			if (isset($_POST['cell_phone'])) {
				$cellPhone = trim($_POST['cell_phone']);
			}

			$sql = "INSERT INTO user (first_name, last_name, email, home_address, home_phone, cell_phone) VALUES ('$firstName', '$lastName', '$email', '$homeAddress', '$homePhone', '$cellPhone')";

			$mysqli = dbConnect();
			$result = $mysqli->query($sql);

			if ($result) {
				echo "hello " . $firstName;
			} else {
				echo "Please filled at least first name, last name and email";
			}

			dbClose($mysqli);
 		?>
	</body>
</html>
