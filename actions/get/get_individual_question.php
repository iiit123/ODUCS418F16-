<?php 
	
	$ques_id = $_GET['ques_id'];

	$sql = "SELECT * from questions INNER JOIN users ON questions.user_id=users.user_id where ques_id='".$ques_id."'";

	$result = $db->query($sql);
	$ques = "";
	$title = "";
	$tags = "";
	$error = "";
	$created_at = "";
	if($result->num_rows > 0) {

		$row = $result->fetch_array(MYSQLI_ASSOC);
		$title = $row['title'];
		$question = $row['question'];
		$tags = $row['tags'];
		$views = $row['views'];
		$email = $row['email'];
		$likes_count = $row['likes_count'];
		$created_at = date('d-M-Y', strtotime($row['created_at']));
		$tags = explode(',', $tags);
	}
	else {
		$error = "something_went_wrong";
	}
	
?>