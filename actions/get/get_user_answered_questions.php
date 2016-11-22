<?php 
	
	$name = $_GET['name'];

	$user_id = get_user_id($db, $name);

	if($user_id) {
		$sql = "SELECT * from questions RIGHT JOIN answers on answers.ques_id=questions.ques_id where answers.user_id='$user_id' and questions.deleted_at is NULL";

		print $sql;

		$result = $db->query($sql);
		$user_answered_questions = [];
		if($result->num_rows > 0) {
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$user_answered_questions[] = $row;
			}
		}
		else {
			unset($user_answered_questions);
			echo false;
		}
	}
?>