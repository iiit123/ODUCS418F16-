<?php
	include('../config.php');
  include('github_auth.php');

  if(!isset($_GET['code'])) {
    if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {

      $captcha = $_POST['g-recaptcha-response'];
      $remote_ip = $_SERVER['REMOTE_ADDR'];
      $captcha_link = "https://www.google.com/recaptcha/api/siteverify?secret=".CAPTCHA_SECRET_KEY."&response=".$captcha."&remoteip=".$remote_ip;
      $response = json_decode(file_get_contents($captcha_link), true);
      if($response.success==false) {
        header("Location: ../views/login_view.php?error_captcha=invalid");
      }
      else {
        $name = trim_data_login($db, $_POST['name']);
        $password = trim_data_login($db, $_POST['password']);

        $sql = "SELECT user_id, name, is_admin FROM users WHERE name = '$name' and password = '$password' and github_user = 0";
        
         $result = mysqli_query($db,$sql);

         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

         $count = mysqli_num_rows($result);

         if($count == 1) {
                
             $_SESSION['user_id'] = $row['user_id'];
             $_SESSION['name'] = $row['name'];
             $_SESSION['admin'] = $row['is_admin'];
             
             header("location: ../views/home_page.php?login=success");
         }
         else {
             header("Location: ../views/login_view.php?error_login=invalid");
         }
      } 
    }
    else {
      header("Location: ../views/login_view.php?error_captcha=invalid");
    }
  }
?>
