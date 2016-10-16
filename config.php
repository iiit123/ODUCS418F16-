<?php 
	date_default_timezone_set('America/New_York');
	
	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', 'M0n@rch$');
   	define('DB_DATABASE', 'milestone1dump');
   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	session_start();

	if(isset($_SESSION['user_id'])){
		$USER_ID = $_SESSION['user_id'];
	}
	else {
		$USER_ID = undefined;
	}

	$labels = ['danger','warning', 'default', 'info', 'primary',  'success'];		
?>
