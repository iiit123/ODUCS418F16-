<?php 

	include('../../config.php');
	
	$sql = "SELECT count(*) as questions_count from questions where deleted_at is NULL";

	$result = $db->query($sql);
   
   	if($result->num_rows > 0) {
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo json_encode($row);
	}
    else {
    	echo "Error: " . $sql . "<br>" . $db->error;
    }

?>