<?php 

    include('../../config.php');

	$ques_id = $_POST['ques_id'];
	$user_id = $_POST['user_id']; 
	$like_flag = $_POST['like_flag'];

	$sql = "SELECT likes_count from questions where ques_id ='".$ques_id."'";
	$result = $db->query($sql);
	if($result->num_rows > 0 ) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$new_likes_count = $row['likes_count'] + $like_flag;
		
		$sql = "UPDATE questions SET likes_count ='".$new_likes_count."'WHERE ques_id='".$ques_id."'";
		$db->query($sql);
	
		$sql = "SELECT like_flag from likes where ques_id ='".$ques_id."' AND user_id ='".$user_id ."'";
		$result = $db->query($sql);

		if($result->num_rows > 0) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$new_like_flag = $row['like_flag'] + $like_flag;
			echo $new_like_flag;
			if($new_like_flag >= 1) {
				$new_like_flag = 1;
			}
			elseif($new_like_flag <= -1) {
				$new_like_flag = -1;
			}
			else {
				$new_like_flag = 0;
			}
			
			$sql = "UPDATE likes SET like_flag='".$new_like_flag."'WHERE ques_id='".$ques_id."'";
			if ($db->query($sql) === TRUE) {
				echo true;
  			} else {
    			echo false;
			}
		}
		else {
			$sql = "INSERT INTO likes (ques_id, user_id, like_flag) VALUES ('".$ques_id."', '".$user_id."', '".$like_flag."')";
			if ($db->query($sql) === TRUE) {
				echo true;
  			} else {
    			echo false;
			}
		}
	}
	else{
		echo false;
	}
?>