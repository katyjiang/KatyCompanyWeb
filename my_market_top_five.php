 <?php
 	include_once "database.php";
	$result = get_high_score();
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
       	unset($row["product_image"]);
		$rows[] = $row;
    }

	$json = json_encode($rows);
	echo ($json);
?>