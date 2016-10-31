<?php 

	include('../../config.php');

	$ques_id = $_GET['ques_id'];
	$sql = "SELECT like_flag, star_flag, ans_id from likes where ques_id='".$ques_id."' and user_id='".$_SESSION['user_id']."'";
	$result = $db->query($sql);
	$output = [];
	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$output[] = $row;
		}
		echo json_encode($output);
	}
	else {
		echo false;
	}
?> 