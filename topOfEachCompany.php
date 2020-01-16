<!DOCTYPE html>
<html>
	<head>
		<title>Most popular 5 products of each company</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body>

		<?php 
			include_once './mypage.php';
			include_once './database.php';
			include_once './config.php';

			session_start();
			backToMarket();
			echo "<h2 style=\"text-align:center\">TOP 5 of Katy.Co.</h2> ";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_URL, WEB_ROOT.'my_market_top_five.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = json_decode(curl_exec ($ch),true);
		?>
	
		<table>
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Avg Rating</th>
			</tr>
	
		<?php
			foreach ($contents as $column) {
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$column["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$column["avg_rating"]."</td>";
				echo "</tr>";
			}
		?>
	
		</table>

		<?php
			echo "<h2 style=\"text-align:center\">TOP 5 of PAYAYA.</h2>";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.findyakun.com/usertopfive.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = json_decode(curl_exec ($ch),true);
		?>

		<table>
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Avg Rating</th>
			</tr>
		
		<?php
			foreach ($contents as $column) {
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$column["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$column["avg_rating"]."</td>";
				echo "</tr>";
			}
		?>

		</table>

		<?php
			curl_close ($ch);
			echo "<h2 style=\"text-align:center\">TOP 5 of ElderMotion.</h2>";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://eldermotion.com/top_products.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contents = json_decode(curl_exec ($ch),true);
		?>
	
		<table>
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Avg Rating</th>
			</tr>
		
		<?php
			foreach ($contents as $column) {
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$column["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$column["avg_rating"]."</td>";
				echo "</tr>";
			}
		?>
	
		</table>

		<?php
			curl_close ($ch);
		?>
	</body>
</html>
