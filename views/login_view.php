<?php include '../config.php'; ?>
<?php if($USER_ID != undefined ) {
    header('location: ./home_page.php');
}?> 
<?php 
    ob_start();
    include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","LOGIN PAGE",$buffer);
    echo $buffer;
?>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

        <style>
            body {
                background: url('../images/login_background.jpg');
                background-size: cover;
                opacity: 0.95;
            }

            .input-group {
                margin-bottom: 15px;
            }

            .text-danger{
                margin-bottom: 20px;
            }

        </style>

    <title> LOGIN PAGE </title>

    <div class="row">
        <div class="col-md-3">
            <a id="back_link" href="./home_page.php" style="margin-left:12px;line-height:50px;color:#eee;font-size:15px;text-decoration:none;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                BACK TO CONNECT 
            </a>
        </div>
    </div>
    <div class="container">    
        <div id="loginbox" style="margin-top:10%;display:none;opacity:0.98" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <form action="../actions/login.php" method="post" id="login_form" class="form-horizontal" role="form">

            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
<!--                         <div style="float:right; font-size: 80%; position: relative; top:-17px"><a href="#">Forgot password?</a></div>
 -->                    </div>     


                    <div style="padding-top:30px" class="panel-body" >
                        
                        <?php if(isset($_GET['error_login'])) {
                            echo '<div class="alert alert-danger">
                                    Invaid username or password !
                                </div>';
                            }
                            else if(isset($_GET['error_captcha'])) {
                                echo '<div class="alert alert-danger">
                                        Invaid captcha. Please try again !
                                    </div>';
                            }
                        ?>

                                    
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-name" type="text" class="form-control" name="name" value="" placeholder="email" required/>     
                            </div>
                            <p id="login_email_error" style="display:none;" class="text-danger">Please enter valid email address<p>
                                
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
                            <div class="input-group">
                                <div class="g-recaptcha" data-sitekey="6Le5Jw0UAAAAAHsHw55OtjKIdJJARfuyUbJeWnLD"></div>
                            </div>
                            <p id="login_password_error" style="display:none;" class="text-danger">Password length should be more than 5 </p>        

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        	<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            	Sign Up 
                                        	</a>
                                        </div>
                                    </div>
                                </div>    
                        </div> 
                        <div class="panel-footer">
                            <button type="submit" id="btn-login" class="btn btn-primary"> <i class="fa fa-sign-in"></i>  &nbsp; Login  </button>
                            <a class="pull-right" href="https://github.com/login/oauth/authorize?scope=user:email&client_id=<?php echo CLIENT_ID;?>" title="Login with Github">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-github-alt" aria-hidden="true"></i>
                                    Login with github.
                                </button>
                            </a>
                        </div>
                    </div>  
            </form>     
        </div>
        <div id="signupbox" style="display:none; margin-top:10%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <form action="../actions/signup.php" method="post" id="login_form" class="form-horizontal" role="form">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-17px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                              <?php if(isset($_GET['error_signup'])) {
                                    echo '<div class="alert alert-danger">
                                        User alert exits!. Please login to continue.
                                    </div>';
                                }?>
                            <form method="post" id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                               	 <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <input id="signup-email" type="text" class="form-control" name="email" placeholder="email" required/>
                                    </div>
                                    <p id="signup_email_error" style="display:none;" class="text-danger">Please enter valid email address<p>
                                    
                                     <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input id="signup-name" type="text" class="form-control" name="name" placeholder="full name" required/>
                                    </div>
                                    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="signup-password" type="password" class="form-control" name="password" placeholder="password" required/>
                                </div>
                         </div>
                        <div class="panel-footer">
                            <button id="btn-signup" name="signup" type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> &nbsp; Sign Up</button>
                            <a class="pull-right" href="https://github.com/login/oauth/authorize?scope=user:email&client_id=<?php echo CLIENT_ID;?>" title="Login with Github">
                                <button type="button" class="btn btn-info">
                                    <i class="fa fa-github-alt" aria-hidden="true"></i>
                                    Login with github.
                                </button>
                            </a>
                        </div>
                    </div>        
                </div> 
            </form>
        </div>
    


	    <?php include('script_files');?>
       
        <script type="text/javascript">

            $(document).ready(function() {

                if ((window.location.href).indexOf("error_signup=user_exists") >= 0) {
                    $('#signupbox').show();
                    $('#loginbox').hide();
                }
                else {

                    var error = '<?php echo $_GET["error_login"];?>';

                    var timer = (error == 'invalid') ? 0 : 1000;

                    $('#back_link').animate({ marginLeft: "0%"} , timer+200);

                    $('#loginbox').slideDown(timer);

                    $('.alert').fadeOut(2000);

                    $('#login_email_error').hide();
                    $('#login_password_error').hide();
                }

//                 $('#btn-login').click(function(e) {
//                     var email = $('#login-email').val(); 
//                     var password = $('#login-password').val();
//                     var email_result = check_email(email);
//                     var password_result = check_length($('#login-password'), 5, 'Password length should be more than 5');

//                     // if(!email_result) {
//                     //     $('#login_email_error').show().fadeOut(3000);
//                     //     e.preventDefault();
//                     // }
                                     
//                     // if(!password_result) {
//                     //     $('#login_password_error').show().fadeOut(3000);
//                     //     e.preventDefault();
//                     // }

// //                    return email_result && password_result;
//                 });

                $('#btn-signup').click(function(e){
                    var email = $('#signup-email').val(); 
                    var password = $('#signup-password').val();
                    var fullname = $('#signup-fullname').val();

                    var email_result =  check_email(email);
                    var password_result = check_length($('#signup-password'), 5, 'Password length should be more than 5');
                    var name_result = check_length($('#signup-name'), 5, 'Password length should be more than 5');

                    if(!email_result) {
                        $('#signup_email_error').show().fadeOut(3000);
                    }
                    var result = email_result && name_result && password_result;
                    if(!result) {
                        e.preventDefault();
                    }
                    console.log(result);
                    return result;
                    

                });

            });
        </script>

     
     <?php include('footer.php'); ?>