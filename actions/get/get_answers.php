<?php 

	$ques_id = $_GET['ques_id'];
	
	$sql = "SELECT *, answers.created_at from answers INNER JOIN users ON answers.user_id=users.user_id where ques_id = '". $ques_id ."'";

	$result = $db->query($sql);
   
   	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$answers[] = $row;
		}
		$answers_count = count($answers);
	}



    else {
    	echo "Error: " . $sql . "<br>" . $db->error;
    }

?>