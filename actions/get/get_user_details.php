<?php
	
	$filename = "../../config.php";
	if (file_exists($filename)) {
		include('../../config.php');
	}

	$name = $_GET['name']; 
	$match_case = isset($_GET['match_case']);

	if($match_case) {
		$sql = "SELECT * FROM users WHERE name like '$name%'";
	}
	else {
		$sql = "SELECT * FROM users WHERE name like '$name'";
	}

	$result = $db->query($sql);
	$user_details = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$user_details[] = encode_array_to_html($db, $row);
		}
		if($match_case) {
			echo json_encode($user_details);
		}
	}
	else {
		$error = "something went wrong";
	}
	

?>