<?php 

  //Stores all the global variables, functions and connects with the db.

	date_default_timezone_set('America/New_York');
	
	define('DB_SERVER', 'localhost');
 	define('DB_USERNAME', 'admin');
 	define('DB_PASSWORD', 'M0n@rch$');
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

  function get_user_id($db, $name) {

    $sql = "SELECT user_id FROM users WHERE name like '$name'";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $user_id = $row['user_id'];
      return $user_id;
    }
    else {
      return null;
    }
  }

  function get_user_email($db, $name) {
    $sql = "SELECT email FROM users WHERE name like '$name'";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $email = $row['email'];
      return $email;
    }
    else {
      return null;
    }
  }

  function upload_image($file_name) {
    $target_dir = "../../images/profile_pictures/";
    $uploadOk = 1;
    $imageFileType = pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION);
    $target_file = $target_dir . $file_name;

    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
            $message = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $message = "File is not an image.";
            $uploadOk = 0;
            return $message;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      unlink($target_file); //remove the file
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
        return $message;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        return $message;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
        return $message;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $message = "Your profile has been successfully updated";
            return $message;
        } else {
            $message = "Sorry, there was an error uploading your file.";
            return $message;
        }
    }
  }
?>
