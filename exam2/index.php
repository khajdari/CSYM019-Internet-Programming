<?php
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['user_id'])) {
		header('Location: pages/login.php');
	} else {
		header('Location: pages/home.php');
	}

?>