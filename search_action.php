<?php
	include_once './database.php';
	session_start();

	$result = [];

	if(isset($_POST['first_name']) && $_POST['first_name'] != ''){
		$result = searchByFirstName(trim($_POST['first_name']));
	}
	

	if(isset($_POST['last_name']) && $_POST['last_name'] != ''){
		$result = searchByLastName(trim($_POST['last_name']));
	}

	if(isset($_POST['email']) && !empty($_POST['email'])){
		$result = searchByEmail(trim($_POST['email']));
	}

	if(isset($_POST['phone_number']) && !empty($_POST['phone_number'])){
		$result = searchByPhonenum(trim($_POST['phone_number']));
	}

    while($row = mysqli_fetch_row($result)) {
    	foreach ($row as $column) {
        	echo $column;// do something with the $row
        	echo " ";
        }
        echo "<br/>";
    }
?>