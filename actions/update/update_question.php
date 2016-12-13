<?php 

    include('../../config.php');
    include('../../required_login.php');
    
    
    $title = trim_data($db, $_POST['title']);
    $question = trim_data($db, $_POST['question']);
    $tags = trim_data($db, $_POST['tags']);
    $ques_id = $_POST['ques_id'];


    $sql = "UPDATE questions SET title ='".$title."', question='".$question."', tags='".$tags."' WHERE ques_id=".$ques_id;

    if ($db->query($sql) === TRUE) {
        header("location: ../../views/individual_question.php?ques_id=".$ques_id);

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    
?>