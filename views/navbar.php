
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="row">
    <div class="container">  
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a id="logo_div" class="navbar-brand" href="home_page.php">
            <img alt="logo" class="logo" src="../images/logo.png" />
            <span class="logo_text"> CONNECT </span>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li id="ask_question" class="header_url"><a href="./ask_question.php">
            <i class="fa fa-question-circle-o fa-lg" aria-hidden="true"></i>
            &nbsp;Ask Question
          </a></li>
          <li id="statistics" class="header_url"><a href="./display_stats.php">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            &nbsp;Statistics
             </a>
          </li>
          <li id="faqs" class="header_url"><a href="./faqs.php">
            <i class="fa fa-exclamation" aria-hidden="true"></i>
            &nbsp;FAQ's
             </a>
          </li>
        </ul>


        <div class="col-sm-3 col-md-4">
           <div style="margin-bottom:0px;" class="form-group">
              <form action="./home_page.php" method="get" class="navbar-form" role="search">
                <div class="input-group">
                  <div class="input-group-btn" >
                      <div class="btn-group" id="search_option"> 
                          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                              <span data-bind="label" id="searchLabel">
                                  <i class="fa fa-tags" aria-hidden="true"></i>
                              </span> <span class="caret"></span>
                          </button> 
                          <ul style="min-width:0px; width:55px;" class="dropdown-menu search_dropdown" role="menu">
                              <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
                          </ul>
                      </div>
                  </div>  
                  <input id="search_content" data-provide="typeahead" autocomplete="off" placeholder="search for tags" name="tag" class="typeahead form-control" />
                  <span class="input-group-btn">
                      <button class="btn btn-primary btn-block" type="submit">
                          GO!
                      </button>
                  </span>
                </div>
              </form>
           </div>
        </div>
      

        
        <ul id="login" class="nav navbar-nav navbar-right login-btns">
          <li>
            <span>
              <?php if(!isset($_SESSION['user_id'])) { ?>
              <a href="./login_view.php" class="btn btn-primary">
                  <i class="fa fa-sign-in" aria-hidden="true"></i>
                  LOG IN 
              </a>
              <?php } else {   
                $image_url = "../images/profile_pictures/".$USERNAME;
                if(!file_exists($image_url)) {
                  $image_url = "../images/profile_icon.png";
                }
                ?>
                <a style="margin-right:25px;" href="./profile_page.php?name=<?php echo $USERNAME; ?>">
                  <img alt="profile_pic" width="35" height="35" src = "<?php echo $image_url;?>" />
                  <?php echo $USERNAME; ?>
                </a>
                <a href="../actions/logout.php" class="btn btn-danger">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    LOG OUT
                </a>
              <?php }?>
            </span>
          </li>
        </ul>
     </div><!--/.nav-collapse -->
    </div>
  </div>
  <?php if($_SESSION['admin'] == 1) { ?>
  <div class="row" style="padding:5px;">
    <div class="container">
      <a href="admin_view_questions.php" class="btn btn-info"><i class="fa fa-question" aria-hidden="true"></i>
Questions Panel</a>
      <a href="admin_view_users.php" class="btn btn-warning"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Users Panel</a>
    </div>
  </div>
  <?php } ?>
</nav>