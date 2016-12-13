<?php 
	if(isset($_GET['code'])) {
		$code = $_GET['code'];
        $post = http_build_query(array(
            'client_id' => CLIENT_ID,
            'redirect_url' => 'localhost/project/views/home_page.php',
            'client_secret' => CLIENT_SECRET,
            'code' => $code,
        ));

        $context = stream_context_create(
            array(
                "http" => array(
                    "method" => "POST",
                    'header'=> "Content-type: application/x-www-form-urlencoded\r\n" .
                                "Content-Length: ". strlen($post) . "\r\n".
                                "Accept: application/json" ,  
                    "content" => $post,
                )
            )
        );

        $json_data = file_get_contents("https://github.com/login/oauth/access_token", false, $context);
        $r = json_decode($json_data , true);
        $access_token = $r['access_token'];
        $scope = $r['scope']; 

        /*- Get User Details -*/
        $url = "https://api.github.com/user?access_token=".$access_token."";
        $options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
        $context  = stream_context_create($options);
        $data = file_get_contents($url, false, $context); 
        $user_data  = json_decode($data, true);
        $email = $user_data['email'];
        $name = $user_data['login'];

        $image_url = $user_data['avatar_url'];


        $sql = "SELECT user_id, name FROM users WHERE name = '$name' or email = '$email'";

        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 0) {
       		$sql = "INSERT INTO users (name, github_user, email, github_image_url) VALUES ('".$name."', 1 , '".$email."', '".$image_url."')";
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
        else {
				$_SESSION['user_id'] = $row['user_id'];
           		$_SESSION['name'] = $name;
           		header("location: ../views/home_page.php?login=success");
        }
	}
?>