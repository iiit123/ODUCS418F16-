<?php 
	
	/**
	 * insert notification 
	 *
	 * string   $vote_type  The vote type like/star/answered.
	 * string   $ques_id    The ques identifier
	 * string   $user_id    The user identifier
	 *
	 * boolean  
	 */
	function insert_notification($vote_type, $ques_id, $user_id) {
		$sql = "INSERT INTO notifications (vote_type, ques_id, user_id) VALUES ('".$vote_type."', '".$ques_id."', '".$user_id."')";

		$result = $db->query($sql);

		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
?>