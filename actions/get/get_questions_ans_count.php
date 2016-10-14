<?php
	include('../../config.php');

	$ques_sql = "SELECT DATE(created_at) AS created_date, count(ques_id) as questions_count FROM questions GROUP BY created_date ORDER BY created_date ASC";
	$ans_sql = "SELECT DATE(created_at) AS created_date, count(ans_id) as answers_count FROM answers GROUP BY created_date ORDER BY created_date ASC";

	$ques_result = $db->query($ques_sql);
	$ans_result = $db->query($ans_sql);

	$count = [];
	if($ques_result->num_rows > 0) {
		while($row = $ques_result->fetch_array(MYSQLI_ASSOC)) {
			$count[$row['created_date']]['questions_count'] = $row['questions_count'];
			$count[$row['created_date']]['answers_count'] = 0;
			
		}


		while($row = $ans_result->fetch_array(MYSQLI_ASSOC)) {
			if(!array_key_exists($row['created_date'], $count)) {
				$count[$row['created_date']]['questions_count'] = 0;			
			}
			$count[$row['created_date']]['answers_count'] = $row['answers_count'];			
			
		}
		echo json_encode($count);
	}
	else {
		$error = "something went wrong";
		echo false;
	}
?>
