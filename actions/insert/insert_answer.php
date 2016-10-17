<?php 
	include('../../config.php');
    include('../../required_login.php');

	$answer = trim_data($db, $_POST['answer']);
	$ques_id = trim_data($db, $_POST['ques_id']);
	$user_id = trim_data($db, $_SESSION['user_id']);

	$sql = "INSERT INTO answers (answer, ques_id, user_id) VALUES ('".$answer."', '".$ques_id."', '".$user_id."')";

    if($db->query($sql) === TRUE) {
        $ans_id = $db->insert_id;

        $sql = "UPDATE questions SET answers_count=answers_count+1 WHERE ques_id='".$ques_id."'";
        if($db->query($sql) === TRUE) {        
            echo $ans_id;
        }
        else {
             echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
    else {
    	echo "Error: " . $sql . "<br>" . $db->error;
    }
?>