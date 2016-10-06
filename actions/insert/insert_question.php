<?php 

	include('../../config.php');
	
	$title = $_POST['title'];
	$question = $_POST['question'];
	$tags = $_POST['tags'];


	$sql = "INSERT INTO questions (title, question, tags, user_id) VALUES ('".$title."', '".$question."', '".$tags."', '".$_SESSION['user_id']."')";


	if ($db->query($sql) === TRUE) {
    	$ques_id = $db->insert_id;
        header("location: ../../views/individual_question.php?ques_id=".$ques_id);

  	} else {
    	echo "Error: " . $sql . "<br>" . $db->error;
	}

	
?>