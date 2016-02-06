<?php
	// TO-DO: make sure GET score is valid format, GET pass is valid password for user, and file (post) 'score' exists
	
	include("includes/sql.php");
  
	$score = explode(":", $_GET['score']);
	$stmt = $db->prepare("INSERT INTO scores
	(
		`maphash`,
		`user`,
		`submithash`,
		`300s`,
		`100s`,
		`50s`,
		`geki`,
		`katu`,
		`misses`,
		`score`,
		`maxcombo`,
		`perfect`,
		`mods`,
		`passed`,
		`grade`
	)
	VALUES(
		:maphash,
		:user,
		:submithash,
		:300s,
		:100s,
		:50s,
		:geki,
		:katu,
		:misses,
		:score,
		:maxcombo,
		:perfect,
		:mods,
		:passed,
		:grade
	);");
	
	//print_r($score);
	
	$passed = 0;
	if($score[14] == "True") {
		$passed = 1;
	}
	
	$perfect = 0;
	if($score[11] == "True") {
		$perfect = 1;
	}
	
	$stmt->bindParam(":maphash", $score[0], PDO::PARAM_STR);
	$stmt->bindParam(":user", $score[1], PDO::PARAM_STR);
	$stmt->bindParam(":submithash", $score[2], PDO::PARAM_STR);
	$stmt->bindParam(":300s", $score[3], PDO::PARAM_INT);
	$stmt->bindParam(":100s", $score[4], PDO::PARAM_INT);
	$stmt->bindParam(":50s", $score[5], PDO::PARAM_INT);
	$stmt->bindParam(":geki", $score[6], PDO::PARAM_INT);
	$stmt->bindParam(":katu", $score[7], PDO::PARAM_INT);
	$stmt->bindParam(":misses", $score[8], PDO::PARAM_INT);
	$stmt->bindParam(":score", $score[9], PDO::PARAM_INT);
	$stmt->bindParam(":maxcombo", $score[10], PDO::PARAM_INT);
	$stmt->bindParam(":perfect", $perfect, PDO::PARAM_INT);
	$stmt->bindParam(":mods", $score[13], PDO::PARAM_STR);
	$stmt->bindParam(":passed", $passed, PDO::PARAM_STR);
	$stmt->bindParam(":grade", $score[12], PDO::PARAM_STR);
	$stmt->execute();
	
	$newid = $db->lastInsertId();
	
	move_uploaded_file($_FILES['score']['tmp_name'], __DIR__ . "/replays/" . $newid);
?>
