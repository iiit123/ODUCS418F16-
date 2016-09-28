<?php 
	include('../config.php');
	session_unset();
	session_destroy();
	echo $_SESSION['user_id'];
	
    header("location: ../views/home_page.php?logout=true");
	
?>