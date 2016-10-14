<?php 
	
	include('../../config.php');

	$sql = "SELECT tags from questions";

	$result = $db->query($sql);

	if($result->num_rows > 0) {
		$tags_string = $result->fetch_array(MYSQLI_ASSOC)['tags'];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$tags_string = $tags_string.','.$row['tags'];
		}
		$exploded_array = explode(',', $tags_string);
		$tags_array = [];
		foreach($exploded_array as $tag) {
			if (array_key_exists($tag, $tags_array)) {
				$tags_array[$tag] = $tags_array[$tag] + 1;
			}
			else {
				$tags_array[$tag] = 1;
			}
		}
		echo json_encode($tags_array);
	}

	else {
		echo false;
	}
	
?>