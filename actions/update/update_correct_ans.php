<?php 
	
	include('../../config.php');
	$ans_id = $_POST['ans_id'];
	$ques_id = $_POST['ques_id'];
	$user_id = $_SESSION['user_id'];

	$sql = "SELECT * from answers where ans_id='".$ans_id."'";
	$result = $db->query($sql);
	if($result->num_rows > 0) {

		$sql = "UPDATE answers set is_correct=0 where ques_id='".$ques_id."' and is_correct=1 and ans_id!='".$ans_id."'";
		$result_1 = $db->query($sql);
		$sql = "UPDATE answers set is_correct=(is_correct ^ 1) where ans_id='".$ans_id."'";
		$result_2 = $db->query($sql);

		if($result_1 && $result_2) {
			echo true;
		}
		else{
			echo false;
		}
	}
	else {
		echo false;
	}
?>