<?php
	
	$sql = "SELECT * from questions";

	$result = $db->query($sql);
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$questions[] = $row;
		}
	}
	else {
		$error = "something_went_wrong";
	}
	

?>