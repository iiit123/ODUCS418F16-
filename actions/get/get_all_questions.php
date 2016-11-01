<?php
	$filename = "../../config.php";
	if (file_exists($filename)) {
		include('../../config.php');
	}
	
	$type = trim($_GET['type']);

	if($type == "All Questions") {
		$sql = "SELECT * from questions";

		$result = $db->query($sql);
		$questions = [];
		if($result->num_rows > 0) {
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$questions[] = $row;
			}
		}
		else {
			unset($questions);
		}
	}
	else if($type == "Recent Questions"){
		$sql = "SELECT * from questions order by created_at DESC";

		$result = $db->query($sql);
		$questions = [];
		if($result->num_rows > 0) {
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$questions[] = $row;
			}
		}
		else {
			unset($questions);
		}
	}
	else if ($type == "Top Questions" || !$type) {
		$sql = "SELECT * from questions order by likes_count desc LIMIT 5";

		$result = $db->query($sql);
		$questions = [];
		if($result->num_rows > 0) {
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$questions[] = $row;
			}
		}
		else {
			unset($questions);
		}
	}

?>