<?php
	
	$sql = "SELECT * from questions order by likes_count desc";

	$result = $db->query($sql);
	$questions = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$questions[] = $row;
		}
	}
	else {
		$error = "something went wrong";
	}
	

?>