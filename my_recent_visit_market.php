<?php
	include_once "database.php";

	$result = get_last_five_visit($_GET['email']);
	$rows = [];
	foreach ($result as $column) {
		unset($column["product_image"]);
		unset($column["product_id"]);
		$rows[] = $column;
	}
	$json = json_encode($rows);
	echo ($json);

?>