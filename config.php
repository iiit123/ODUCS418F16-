<?php 

  //Stores all the global variables, functions and connects with the db.

	date_default_timezone_set('America/New_York');
	

  define('CLIENT_ID', '7904d43058fd2e4ae4dd');
  define('CLIENT_SECRET', '2d1f9709f5aafe3d6a315e18eb99bcf9dd08da5a');
  define('APP_NAME', 'connect');


	define('DB_SERVER', 'localhost');
 	define('DB_USERNAME', 'admin');
 	define('DB_PASSWORD', 'M0n@rch$');
 	define('DB_DATABASE', 'milestone4dump');
  define('CAPTCHA_SECRET_KEY', '6Le5Jw0UAAAAAMQsBMdJjkSUD6ysA8FY4O-DbZsc');
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

  function encode_array_to_html($db, $data_array) {
    $new_data_array = [];
    foreach($data_array as $key => $value) {
      $new_data_array[$key] = trim_data($db, $value);
    }
    return $new_data_array;
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

  function get_github_image_url($db, $name) {
    $sql = "SELECT github_image_url FROM users WHERE name like '$name'";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $image_url = $row['github_image_url'];
      return $image_url;
    }
    else {
      return false;
    }
  }

  function get_image_url($db, $name) {

    $github_image_url = get_github_image_url($db, $name);

    if($github_image_url) {
      return $github_image_url;
    }

    $image_url = "../images/profile_pictures/".$name;
    $default_url = "../images/profile_icon.png";
    if(!file_exists($image_url)) {
      $email = get_user_email($db, $name);
      if($email != "") {
        $hashed_email = md5($email);
        $gravatar_url = "https://www.gravatar.com/avatar/".$hashed_email;
        $gravcheck = "http://www.gravatar.com/avatar/".$hashed_email."?d=404";
        $response = get_headers($gravcheck);
        if ($response[0] != "HTTP/1.1 404 Not Found"){
            return $gravatar_url;
        }
        else {
          return $default_url;
        }  
      }
      else {
        return $default_url;
      }      
    }
    return $image_url;
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

  function get_user_score($db, $user_id) {
    $sql = "SELECT sum(likes_count) as score from questions where user_id=".$user_id." and deleted_at is NULL";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $score = $row['score'];
      if($score == NULL){
        return 0;
      }
      return $score;
    }
    else{
      return 0;
    }
  }

  function get_user_asked_questions_count($db, $user_id) {
    $sql = "SELECT count(ques_id) as count from questions where user_id=".$user_id." and deleted_at is NULL GROUP BY user_id";
    $result = $db->query($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $score = $row['count'];
      if($score == NULL){
        return 0;
      }
      return $score;
    }
    else{
      return 0;
    }
  }

  function upload_image($file_name) {

    //Source: W3 Schools.

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
