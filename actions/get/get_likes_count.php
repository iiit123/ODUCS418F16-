<?php 
	$ques_id = $_POST['ques_id'];
	
	$sql = "SELECT likes_count from questions where ques_id='".$ques_id."'";
	if($result->num_rows > 0) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo $row['likes_count'];
	}
	else {
		echo false;
	}
?> 