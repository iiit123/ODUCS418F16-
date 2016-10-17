<?php 

	include('../../config.php');
	include('../../required_login.php');
    
	
	$title = trim_data($db, $_POST['title']);
	$question = trim_data($db, $_POST['question']);
	$tags = trim_data($db, $_POST['tags']);


	$sql = "INSERT INTO questions (title, question, tags, user_id) VALUES ('".$title."', '".$question."', '".$tags."', '".$_SESSION['user_id']."')";


	if ($db->query($sql) === TRUE) {
    	$ques_id = $db->insert_id;
        header("location: ../../views/individual_question.php?ques_id=".$ques_id);

  	} else {
    	echo "Error: " . $sql . "<br>" . $db->error;
	}

	
?>