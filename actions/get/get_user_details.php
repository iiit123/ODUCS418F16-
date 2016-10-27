<?php
	
	include('../../config.php');

	$name = $_GET['name'];

	$sql = "SELECT user_id, name FROM users WHERE name like '$name%'";

	$result = $db->query($sql);
	$details = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$details[] = $row;
		}
		echo json_encode($details);
	}
	else {
		$error = "something went wrong";
	}
	

?>