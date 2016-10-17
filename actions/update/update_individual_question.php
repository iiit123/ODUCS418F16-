<?php
	include('../../config.php');

	$question = trim_data($db, $_POST['question']);
	$ques_id = trim_data($db, $_POST['ques_id']);
	$user_id = trim_data($db, $_SESSION['user_id']);

	$sql = "UPDATE questions SET question='".$question."' where ques_id='".$ques_id."' and user_id='".$user_id."'";

	$result = $db->query($sql);

	if($result) {
		echo true;
	}
	else {
		echo false;
	}
?>