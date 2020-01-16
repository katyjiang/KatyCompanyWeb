<!DOCTYPE html>
<html>
	<head>
		<title>Recently Visit within Market</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body>

		<?php
			include_once './mypage.php';
			include_once './database.php';
			include_once './config.php';

			session_start();
			backToMarket();
    		if(isset($_SESSION['valid_user_email'])) {
				echo "<h2 style=\"text-align:center\">You Recently Visit Katy.Co.</h2> ";
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_URL, WEB_ROOT.'my_recent_visit_market.php?email='.$_SESSION['valid_user_email']);

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

				$contents = json_decode(curl_exec ($ch),true);
		?>

		<table style="text-align:center">
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Visit Time</th>
			</tr>

		<?php
			foreach ($contents as $column) {
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$column["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$column["time_stamp"]."</td>";
				echo "</tr>";
			}
		?>
		
		</table>

		<?php
			echo "<br/><h2 style=\"text-align:center\">You Recently Visit Payaya Yoga.</h2> ";
			curl_setopt($ch, CURLOPT_URL, 'https://www.findyakun.com/recent_visit.php?email='.$_SESSION['valid_user_email']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = json_decode(curl_exec ($ch),true);
		?>

		<table style="text-align:center">
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Visit Time</th>
			</tr>

		<?php
			foreach ($contents as $column) {
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$column["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$column["timestamp"]."</td>";
				echo "</tr>";
			}
		?>

		</table>

		<?php
			echo "<br/><h2 style=\"text-align:center\">You Recently Visit ElderMotion.</h2> ";
			curl_setopt($ch, CURLOPT_URL, 'https://eldermotion.com/recent_five.php?email='.$_SESSION['valid_user_email']);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = json_decode(curl_exec ($ch),true);
		?>

		<table style="text-align:center">
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Visit Time</th>
			</tr>

		<?php
			foreach ($contents as $column) {
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$column["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$column["time_stamp"]."</td>";
				echo "</tr>";
			}
		?>

		</table>


		<?php
			curl_close ($ch);

			} else {
				echo '<p id="response">You must <a href = "fb_login.php"> log in</a> to see your footprints.</p>';
			}
		?>
	</body>
</html>