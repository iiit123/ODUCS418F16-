<?php 
	include('../../config.php');

	$ques_id = $_POST['ques_id'];

	$sql = "UPDATE questions SET freeze_flag=freeze_flag^1 WHERE ques_id='".$ques_id."'";
	if ($db->query($sql) === TRUE) {
		echo true;
	} 
	else {
		echo false;
	}
?>