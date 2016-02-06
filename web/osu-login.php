<?php
	include("includes/sql.php");
	
	$stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?;");
	$stmt->execute(array(trim($_GET['username']), trim($_GET['password'])));
	
	if($stmt->rowCount() >= 1) {
		echo "1";
	} else {
		echo "0";
	}
	
	$db = null;
	
	die();
?>
