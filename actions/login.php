<?php
	include('../config.php');

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT user_id, email FROM users WHERE email = '$email' and password = '$password'";
 
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if($count == 1) {
     	  
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        
        header("location: ../views/home_page.php?login=success");

    }

    else {

        header("Location: ../views/login_view.php?error_login=invalid");
    }

?>