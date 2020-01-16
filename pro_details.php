
<!DOCTYPE html>
<html>
	<head>
		<title>Products Details</title>
		<style>
			.star{
   				display: inline-block;
    			width: 50px;
    			height: 50px;
    			cursor: pointer;
    			background-image: url('./star-blank.png');
    			background-size: cover;
    			background-repeat: no-repeat;
    			background-position: center center;
  			}
			.star.over{
    			background-image: url('./star.png');
			}
		</style>
		<script src="rating.js"></script>
		<link rel="stylesheet" href="./css/bare/css/bare.min.css" />
	</head>

	<body>
		
		<?php 
			include_once './mypage.php';
			include_once './database.php'; 
			include_once './rating.php'; 
			include_once './comments_detail.php';
			include_once './config.php';

			$starLib = new Rating(); 
			session_start(); 
			renderHeader(); 
			renderRegisterLogin();


			$result = [];
			$result = listOneProduct($_GET['product_name']);
			while($row = mysqli_fetch_assoc($result)) {
	            echo "<h2 style=\"text-align: center;\">";
	        	echo $row['product_name'];
	        	echo "</h2>";

	        	echo "<p style=\"text-align: center;\">";
	       		echo $row['price'];
	    		echo "</p>";

	        	echo "<p style=\"text-align: center;\">";
	        	echo $row['description'];
	        	echo "</p>";

	        	if(isset($_SESSION['valid_user_email'])){
	        		addVisitStatus($_SESSION['valid_user_email'], $row['product_id']);
	        	}
	  			$id = $row['product_id'];
				$a = PUBLIC_IMAGE_FOLDER; 
	  			$b = $row['product_image']; 
	  			$c = $a.$b;
	        	echo "<img style=\"display: block; margin: auto\" src='$c' width='300' height='300' class='center'>";
	    	}
	    	
	    	echo "<br/>";
	    	echo "<div style=\"margin-left: 18%;\">";
			display_comments($id);
			echo "</div>";

			$product_array= [];
			if (isset($_COOKIE['product'])) {
				$product_array = json_decode($_COOKIE['product'], true);
			}

			$size = count($product_array);
			$hasDuplicate = False;
			if ($size >= 5) {
				for ($i = 0; $i < 5; $i++) {
					if(strcmp($product_array[$i],$_GET['product_name']) == 0){
						$hasDuplicate = True;
						while($i < 4){
							$product_array[$i] = $product_array[$i+1];
							$i++;
						}
						break;
					}
				}
				if ($hasDuplicate) {
					$product_array[4] = $_GET['product_name'];
				}else{
					for($i = 0; $i<4; $i++){
						$product_array[$i] = $product_array[$i+1];
					}
					$product_array[4] = $_GET['product_name'];
				}

			} else {
				for ($i = 0; $i < $size; $i++) {
					if(strcmp($product_array[$i],$_GET['product_name']) == 0){
						$hasDuplicate = True;
						while($i < $size-1){
							$product_array[$i] = $product_array[$i+1];
							$i++;
						}
						break;
					}
				}
				if ($hasDuplicate) {
					$product_array[$size-1] = $_GET['product_name'];

				}else{
					
					array_push($product_array, $_GET['product_name']);
				}
			}

			setcookie('product', json_encode($product_array), time()+3600);

			$most_visit = array();

			if (isset($_COOKIE['most_visit'])) {
				$most_visit = json_decode($_COOKIE['most_visit'], true);
			}

			if (!array_key_exists($_GET['product_name'], $most_visit)) {
				$most_visit[$_GET['product_name']] = 1;
			}else{
				$visit_time = $most_visit[$_GET['product_name']] + 1;
				$most_visit[$_GET['product_name']] = $visit_time;
			}
			setcookie('most_visit', json_encode($most_visit), time()+3600);
	 	?>

	 	<br/><br/><br/>;
	 	<div id="rating" style="margin-left: 18%; margin-right: 18%;">
	    	<h3 style="text-align: center;">Rate this product</h3>
	    	<input type="hidden" id="rate-id" value="<?=$id?>"/>
	    	<?php
	    		if(isset($_SESSION['valid_user_email'])){
					for ($i=0; $i<5; $i++) {
	    				printf("<div class='star' onmouseover='rating.highlight(%u)' onclick='rating.save(%u)'></div>", $i+1, $i+1);
	    	
	    			}
	    	?>
	    				<table id="newpostform">
							<tr>
								<td colspan="2">
								<textarea style="border:solid 1px orange;" name="message" rows="10" cols="55" id="comment"></textarea>
								</td>
							</tr>
							<tr style="border: none;">
								<td colspan=2 align='center' style="border:none;"><input type='submit' onclick='rating.post_comment()'></td>
							</tr>
						</table>
			<?php
				} else {
					echo '<p id="response">You must <a href = "fb_login.php"> log in</a> in order to rate this product.</p>';
				}	

	    	?>
			


	    	<h3 style="text-align:center;">The average rating of this product</h3>
	    	<?php
	    		$avg_rating = $starLib->avg($id);
	    		$c = number_format($avg_rating,2);
	    		echo "<p style=\"text-align:center;\">".$c."</p>";
	    	?>
	    	
		</div>
	</body>
</html>
