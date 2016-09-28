<style type="text/css">
      .login-btns {
        margin-top: 10px;
      }

      .logo {
        float: left;
        width: 50px;
      }

      .navbar-brand {
        padding: 0px;
        margin-right: 20px; 
      }

      .logo_text {
        line-height: 50px;
      }
</style>

<nav class="navbar navbar-default navbar-fixed-top">
      		<div class="container">
        		<div class="navbar-header">
       			   <a class="navbar-brand" href="home_page.php">
       			   		<img class="logo" src="../images/logo.png" />
       			   		<span class="logo_text"> CONNECT </span>
       			   </a>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
          		<ul class="nav navbar-nav">
           			<li class="active"><a href="./ask_question.php">Ask Question</a></li>
            		<li><a href="#about">About</a></li>
            		<li><a href="#contact">Contact</a></li>
            		<li class="dropdown">
             	 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              			<ul class="dropdown-menu">
                			<li><a href="#">Action</a></li>
                			<li><a href="#">Another action</a></li>
                			<li><a href="#">Something else here</a></li>
                			<li role="separator" class="divider"></li>
                			<li class="dropdown-header">Nav header</li>
                			<li><a href="#">Separated link</a></li>
               	 			<li><a href="#">One more separated link</a></li>
              			</ul>
            		</li>
          		</ul>
          		<ul class="nav navbar-nav navbar-right login-btns">
                <?php if(!isset($_SESSION['user_id'])) { ?>
          			<button class="btn btn-success"> 
          				<i class="fa fa-user-plus" aria-hidden="true"></i>
          				SIGN UP 
          			</button>
          			<a href="./login_view.php">
                  <button class="btn btn-primary">
          			  	<i class="fa fa-sign-in" aria-hidden="true"></i>
          			  	LOG IN 
          			  </button>
                </a>
                <?php } else {   ?>
                  <a href="../actions/logout.php">
                    <button class="btn btn-danger">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>
                      LOG OUT
                    </button>
                  </a>
                <?php }?>
          		</ul>
       		 </div><!--/.nav-collapse -->
      		</div>
</nav>