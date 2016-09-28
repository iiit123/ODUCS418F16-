<?php 
	
	function update_question_views($db, $ques_id) {
		$sql = "UPDATE questions SET views=views+1 WHERE ques_id='".$ques_id."'";
		if ($db->query($sql) === TRUE) {
			return true;
  		} else {
    		return false;
		}

	}
?> 