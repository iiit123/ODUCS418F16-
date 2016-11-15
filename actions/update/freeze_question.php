<?php 
	include('../../config.php');

	$ques_id = $_POST['ques_id'];

	$mysql_date_now = date("Y-m-d H:i:s");

	$sql = "UPDATE questions SET deleted_at='".$mysql_date_now."' WHERE ques_id='".$ques_id."'";
	if ($db->query($sql) === TRUE) {
		return true;
	} 
	else {
		return false;
	}
?>