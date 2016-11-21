<?php 
	

	if(isset($_GET['request_type'])) {
		include('../../config.php');
	}

	$ques_id = $_GET['ques_id'];

	$sql = "SELECT *,questions.created_at as created_at from questions INNER JOIN users ON questions.user_id=users.user_id where questions.deleted_at is NULL and ques_id='".$ques_id."'";

	$result = $db->query($sql);
	$ques = "";
	$title = "";
	$tags = "";
	$error = "";
	$created_at = "";
	$asker_id = "";
	if($result->num_rows > 0) {

		$row = $result->fetch_array(MYSQLI_ASSOC);
		$asker_id = $row['user_id'];
		$title = decode_data($row['title']);
		$question = decode_data($row['question']);
		$tags = $row['tags'];
		$views = $row['views'];
		$name = $row['name'];
		$likes_count = $row['likes_count'];
		$created_at = date('d-M-Y', strtotime($row['created_at']));
		$freeze_flag = $row['freeze_flag'];	
	
		$tags = explode(',', $tags);

		if(isset($_GET['request_type'])) {
			echo json_encode(array('question'=>$question, 'title'=>$title, 'tags'=>$tags));
		}

	}
	else {
		header('location: ../views/page_not_found.php');
	}
	
?>