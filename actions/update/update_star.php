<?php 
	
	include('../../config.php');

	$ques_id = $_POST['ques_id'];

	$sql = "SELECT star_flag from likes where ques_id ='".$ques_id."' AND user_id ='".$_SESSION['user_id'] ."'";

	$result = $db->query($sql);

	if($result->num_rows > 0) {
		$sql = "UPDATE likes SET star_flag= (star_flag ^ 1) WHERE ques_id='".$ques_id."'";
		$result = $db->query($sql);
		echo $result;
	}

	else {
		$sql = "INSERT INTO likes (ques_id, user_id, star_flag) VALUES ('".$ques_id."', '".$_SESSION['user_id']."', 1)";
		$result = $db->query($sql);
		echo $result;
	}
?>	