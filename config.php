<?php 
	date_default_timezone_set('America/New_York');
	
	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'web_programming');
   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	session_start();


	$labels = ['danger','warning', 'default', 'info', 'primary',  'success'];		
?>
