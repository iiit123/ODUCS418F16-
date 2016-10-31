<?php 
	
	$name = $_GET['name'];

	$user_id = get_user_id($db, $name);

	if($user_id) {

		$sql = "SELECT * from questions RIGHT JOIN likes on likes.ques_id=questions.ques_id where likes.user_id='$user_id' and star_flag=1";

		$result = $db->query($sql);
		$user_star_questions = [];
		if($result->num_rows > 0) {
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$user_star_questions[] = $row;
			}
		}
		else {
			unset($user_star_questions);
			echo false;
		}
	}
?>