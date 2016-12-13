<?php
	include('../config.php');
    include('github_auth.php');

    if(!isset($_GET['code'])) {
    	$name = trim_data_login($db, $_POST['name']);
    	$password = trim_data_login($db, $_POST['password']);
    	$email = trim_data_login($db, $_POST['email']);

    	$sql = "SELECT user_id, name FROM users WHERE name = '$name' and github_user=0";
        
        $result = mysqli_query($db,$sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count > 0) {
        	header("Location: ../views/login_view.php?error_signup=user_exists");
        }
        else {
    		$sql = "INSERT INTO users (name, password, email) VALUES ('".$name."', '".$password."', '".$email."')";
    		if($db->query($sql) === TRUE) {
    	        $user_id = $db->insert_id;
    			$_SESSION['user_id'] = $user_id;
           		$_SESSION['name'] = $name;
            
           		header("location: ../views/home_page.php?login=success");
        	}
        	else {
        		echo "Error: " . $sql . "<br>" . $db->error;
        	}
        }
    }

?>