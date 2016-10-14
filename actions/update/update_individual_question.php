<?php
	include('../../config.php');

	$question = $_POST['question'];
	$ques_id = $_POST['ques_id'];
	$user_id = $_SESSION['user_id'];


	$sql = "UPDATE questions SET question='".$question."' where ques_id='".$ques_id."' and user_id='".$user_id."'";

	$result = $db->query($sql);

	if($result->num_rows > 0) {
		echo true;
	}
	else {
		echo false;
	}
?>