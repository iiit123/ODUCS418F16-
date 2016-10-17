<?php 
	include('../config.php');
	session_unset();
	session_destroy();
	
    header("location: ../views/home_page.php?logout=true");
	
?>