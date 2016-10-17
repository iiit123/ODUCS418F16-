<?php
	include('../config.php');

	$name = trim_data_login($db, $_POST['name']);
	$password = trim_data_login($db, $_POST['password']);

	$sql = "SELECT user_id, name FROM users WHERE name = '$name' and password = '$password'";
 
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if($count == 1) {
     	  
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];
        
        header("location: ../views/home_page.php?login=success");

    }

    else {

        header("Location: ../views/login_view.php?error_login=invalid");
    }

?>