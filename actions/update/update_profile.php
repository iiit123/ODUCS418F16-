<?php
	include('../../config.php');

	$email = trim_data($db, $_POST['email']);
	$name = trim_data($db, $_POST['name']);
	$password = trim_data($db, $_POST['password']);
	$about_me = trim_data($db, $_POST['about_me']);

    $sql = "UPDATE users SET email='".$email."', password='".$password."', about_me='".$about_me."' WHERE user_id='".$USER_ID."'";
    if($db->query($sql) === TRUE) { 
	    if($_FILES['file']['error'] != UPLOAD_ERR_NO_FILE){
			$message = upload_image($name);
			$_SESSION['upload_message'] = $message;
		} 
		else {
			$_SESSION['upload_message'] = "Your profile has been successfully updated";
		}       
    }
    else {
         $_SESSION['upload_message'] = "Error: " . $sql . "<br>" . $db->error;
    }
   header('location: ../../views/profile_page.php?name='.$name);
?>