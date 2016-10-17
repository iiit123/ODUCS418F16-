<?php 

  //Stores all the global variables, functions and connects with the db.

	date_default_timezone_set('America/New_York');
	
	define('DB_SERVER', 'localhost');
 	define('DB_USERNAME', 'root');
 	define('DB_PASSWORD', 'password');
 	define('DB_DATABASE', 'milestone1dump');
 	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	session_start();

	if(isset($_SESSION['user_id'])){
		$USER_ID = $_SESSION['user_id'];
    $USERNAME = $_SESSION['name'];
	}
	else {
		$USER_ID = undefined;
	}

	$labels = ['danger','warning', 'default', 'info', 'primary',  'success'];		


  /**
   * { format the data so that db query can be processed. }
   * <object>  $db     The database
   * <string>  $data   The data
   * <string>  ( returns formatted string )
   */
	function trim_data_login($db, $data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = mysqli_real_escape_string($db, $data);
  		return $data;
  }

  /**
   * { format the data to store it in db}
   * <object>  $db     The database
   * <string>  $data   The data
   * <string>  ( returns formatted string )
   */
  function trim_data($db, $data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = mysqli_real_escape_string($db, $data);
      return $data;
  }

  /**
   * { decode data to be displayed on the html page }
   * <string>  $data   The data
   * <string>  ( returns formated string )
   */
  function decode_data($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars_decode($data);
  	return $data;
  }
?>
