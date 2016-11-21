<?php 

	$ques_id = $_GET['ques_id'];

	if(!isset($_GET['page_number'])) {
		$page_number = 1;
	}
	else {
		$page_number = $_GET['page_number'];
	} 

	$sql = "SELECT *, answers.created_at from answers INNER JOIN users ON answers.user_id=users.user_id where ques_id = '". $ques_id ."' ORDER BY is_correct DESC, likes_count DESC LIMIT ".(($page_number-1)*5).", 5";

	$result = $db->query($sql);
   
   	if($result->num_rows > 0) {
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$answers[] = $row;
		}
	}

    else {
    	echo "Error: " . $sql . "<br>" . $db->error;
    }

?>