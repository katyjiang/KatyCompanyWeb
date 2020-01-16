<!DOCTYPE html>
<html>
	<head>
		<title>Most Popular 5 Products of Our Market</title>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body>
		
		<?php 
			include_once './mypage.php';
			include_once './database.php';
			include_once './config.php';

			session_start();
			backToMarket();

			function cmp($a, $b)
	    	{
	    		return strcmp($b["avg_rating"], $a["avg_rating"]);
	    	}

			echo "<h2 align='center'>The Most Popular 5 Products of Our Market.</h2> ";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.findyakun.com/usertopfive.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contentsOne  = json_decode(curl_exec ($ch), true);
			curl_setopt($ch, CURLOPT_URL, 'https://eldermotion.com/top_products.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contentsTwo  = json_decode(curl_exec ($ch), true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_URL, WEB_ROOT.'my_market_top_five.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$contentsThree  = json_decode(curl_exec ($ch), true);
			curl_close ($ch);
			$result = array_merge($contentsOne, $contentsTwo, $contentsThree);
			usort($result, "cmp");
		?>
	
		<table style="margin-left:auto; margin-right:auto; width=500px  !important">
			<tr style="text-align:center">
				<th style="text-align:center">Product Name</th>
				<th style="text-align:center">Avg Rating</th>
			</tr>
	
		<?php
			for($i = 0; $i < 5; $i++){
				echo "<tr style=\"text-align:center\">";
				echo "<td style=\"text-align:center\">".$result[$i]["product_name"]."</td>";
				echo "<td style=\"text-align:center\">".$result[$i]["avg_rating"]."</td>";
				echo "</tr>";
			}

		?>
	
		</table>
	</body>
</html>

