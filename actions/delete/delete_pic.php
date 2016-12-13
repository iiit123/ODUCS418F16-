<?php 
	include('../../config.php');

	$image_name = $_SESSION['name'];
	$path = "../../images/profile_pictures/".$image_name; 
	if (file_exists($path)) {
	    unlink($path);
	}
    header("location: ../../views/profile_page.php?name=".$image_name);
?>