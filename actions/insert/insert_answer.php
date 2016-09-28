<?php 
	include('../../config.php');
	$answer = $_POST['answer'];
	$ques_id = $_POST['ques_id'];
	$user_id = $_SESSION['user_id'];

	$sql = "INSERT INTO answers (answer, ques_id, user_id) VALUES ('".$answer."', '".$ques_id."', '".$user_id."')";

    if($db->query($sql) === TRUE) {
    	echo $ans_id = $db->insert_id;
    }
    else {
    	echo "Error: " . $sql . "<br>" . $db->error;
    }
?>