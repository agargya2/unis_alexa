<?php
	$info = array();
	$emailToCheck = $_GET['text'];
	if (filter_var($emailToCheck, FILTER_VALIDATE_EMAIL)) {
		array_push($info, true);
	} else {
		array_push($info, false);
	}

	echo json_encode($info);
?>