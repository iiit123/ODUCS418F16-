<?php 

	$name = $_GET['name'];

	$user_id = get_user_id($db, $name);
	
	if($user_id) {
		$sql = "SELECT * from questions where user_id='$user_id' and deleted_at is NULL";

		$result = $db->query($sql);
		$user_asked_questions = [];
		if($result->num_rows > 0) {
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$user_asked_questions[] = $row;
			}
		}
		else {
			unset($user_asked_questions);
			echo false;
		}
	}

?>