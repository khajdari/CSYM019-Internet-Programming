<?php
	session_start();
    include_once('../helpers/auth.php');
	include_once('../config/db.php');
	protectedpage();
    $conn = new Db();

	if(isset($_POST['program-id'])) {
		$programId = $_POST['program-id'];
		$query = "
			DELETE FROM program 
			WHERE
			id = ".$programId."
		";
		$result = $conn->sqlExec($query);

		if($result) {
			header("Location: home.php");
		}
	}
?>