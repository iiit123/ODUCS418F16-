<?php 

	include('../../config.php');

	$ques_id = $_GET['ques_id'];
	$sql = "SELECT like_flag, star_flag from likes where ques_id='".$ques_id."' and user_id='".$_SESSION['user_id']."'";
	$result = $db->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo json_encode($row);
	}
	else {
		echo false;
	}
?> 