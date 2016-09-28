<?php 

    include('../../config.php');

	$ques_id = $_POST['ques_id'];
	$user_id = $_POST['user_id']; 
	$like_flag = $_POST['like_flag'];


	$sql = "SELECT like_flag from likes where ques_id ='".$ques_id."' AND user_id ='".$user_id ."'";
	$result = $db->query($sql);

	if($result->num_rows > 0) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$new_like_flag = $row['like_flag'] + $like_flag;
		if($new_like_flag > 1) {
			echo 2;
			exit;
		}
		elseif($new_like_flag < -1) {
			echo -2;
			exit;
		}
		else {
			$sql = "UPDATE likes SET like_flag='".$new_like_flag."'WHERE ques_id='".$ques_id."'";
			if ($db->query($sql) === TRUE) {
				$sql = "UPDATE questions SET likes_count=likes_count+$like_flag WHERE ques_id='".$ques_id."'";
				if($db->query($sql)){
					echo $new_like_flag;
				}
			} else {
	    		echo false;
			}
			
		}
	}
	else {
		$sql = "INSERT INTO likes (ques_id, user_id, like_flag) VALUES ('".$ques_id."', '".$user_id."', '".$like_flag."')";
		if ($db->query($sql) === TRUE) {
			$sql = "UPDATE questions SET likes_count=likes_count+$like_flag WHERE ques_id='".$ques_id."'";
			if($db->query($sql)) {
				echo $new_like_flag;
			}
  		} else {
    		echo false;
		}
	}

?>