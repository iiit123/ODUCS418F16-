<?php 
	$tag = trim_data($db,$_GET['tag']);
	$sql = "select * from questions where tags like '%".$tag."%'";
	$result = $db->query($sql);
	$questions = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$questions[] = $row;
		}
	}
	else {
		unset($questions);
		$error = "No questions found with this tag";
	}
?>