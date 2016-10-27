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
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
       			  <a class="navbar-brand" href="home_page.php">
       			   		<img class="logo" src="../images/logo.png" />
       			   		<span class="logo_text"> CONNECT </span>
       			  </a>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
          		<ul class="nav navbar-nav">
           			<li class="header_url"><a href="./ask_question.php">
                  <i class="fa fa-question-circle-o fa-lg" aria-hidden="true"></i>
                  &nbsp;Ask Question
                </a></li>
            		<li class="header_url"><a href="./display_stats.php">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  &nbsp;Statistics
                   </a>
                </li>
            	</ul>


              <div class="col-sm-3 col-md-4">
                 <div class="form-group">
                    <form action="./home_page.php" method="get" class="navbar-form" role="search">
                      <div class="input-group">
                        <div class="input-group-btn" >
                            <div class="btn-group"> 
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span data-bind="label" id="searchLabel">
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                    </span> <span class="caret"></span>
                                </button> 
                                <ul style="min-width:0px; width:55px;" class="dropdown-menu" role="menu">
                                    <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>  
                        <input id="search_content" placeholder="search for tags" name="tag" class="form-control" />
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-block" type="submit">
                                GO!
                            </button>
                        </span>
                      </div>
                    </form>
                 </div>
              </div>
          		
              <ul class="nav navbar-nav navbar-right login-btns">
                <?php if(!isset($_SESSION['user_id'])) { ?>
          			<a href="./login_view.php">
                  <button class="btn btn-primary">
          			  	<i class="fa fa-sign-in" aria-hidden="true"></i>
          			  	LOG IN 
          			  </button>
                </a>
                <?php } else {   
                  ?>

                  <span style="margin-right:25px;">
                    <a href="./profile_page.php?name=<?php echo $USERNAME; ?>">
                      <i style="color:grey;" class="fa fa-user" aria-hidden="true"></i>
                      <?php echo $USERNAME; ?>
                    </a>
                  </span>
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