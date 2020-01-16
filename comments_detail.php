<?php
	function display_comments($product_id) {
		$comment = get_product_comments($product_id);
?>
	<?php
		echo "<h4>What Our Customers say</h4>";
		foreach($comment as $column) {
			echo "<p style=\"line-height: 0.2;\">User : ".$column['email']."</p>";
			echo "<p style=\"line-height: 0.2;\">Rating : ". $column['rating']."</p>";
			echo "<p style=\"line-height: 0.2;\">Comment : " . $column['comment']."</p>";
		}
	?>
	   
<?php
	}
?>
