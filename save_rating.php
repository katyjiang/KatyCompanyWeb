<?php
	// (1) INIT - LOAD LIBRARY
	require_once "rating.php";

	$starLib = new Rating();
	// ! Use your own system's user session !
	session_start();

	// (3) HANDLE AJAX REQUESTS
	switch ($_POST['req']) {
 	 /* [INVALID REQUEST] */
  		default:

   		echo "Invalid request";
    	break;

  		/* [SAVE RATING] */
  		case "save":

    	echo $starLib->save($_POST['product_id'], $_SESSION['valid_user_email'], $_POST['rating'], $_POST['comment']) ? "OK" : "ERR";
    	break;
	}
?>