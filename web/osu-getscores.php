<?php
  // TO-DO: make sure GET c exists
	include("includes/sql.php");
	
	$stmt = $db->prepare("SELECT * FROM scores WHERE maphash = ? AND passed = 1 ORDER BY score DESC;");
	$stmt->execute(array($_GET['c']));
	
	foreach($stmt->fetchAll() as $row) {
		$perfect = "false";
		if($row['perfect'] == "1") {
			$perfect = "true";
		}
		echo $row['id'] . ":" . $row['user'] . ":" . $row['score'] . ":" . $row['maxcombo'] . ":" . $row['50s'] . ":" . $row['100s'] . ":" . $row['300s'] . ":" . $row['misses'] . ":" . $row['katu'] . ":" . $row['geki'] . ":" . $perfect . ":" . $row['mods'] . "\n";
	}
?>
