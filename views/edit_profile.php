<?php include('../actions/get/get_user_details.php');?>
<?php $details = $user_details[0];?>

<div class="row">
    <div class="col-md-2 text-center">
      <div class="panel panel-default">
        <?php 
        $image_url = "../images/profile_pictures/".$_GET['name'];
        if(!file_exists($image_url)) {
          $image_url = "../images/profile_icon.png";
        } ?>

        <div class="panel-body"><img alt="user_profile_pic" style="width:100%;" src="<?php echo $image_url;?>"/></div>
        <div class="panel-footer">
          <?php echo $_GET['name']; ?>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php if(isset($_SESSION['upload_message'])) {?> 
        <div class="alert alert-warning">
            <?php echo $_SESSION['upload_message'];?>
            <?php unset($_SESSION['upload_message']); ?>
        </div>
      <?php }?>
      <?php if($_SESSION['name']== $_GET['name']) {?>
        <form action="../actions/update/update_profile.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Email address</label>
            <input name="email" type="email" class="form-control" value="<?php echo $details['email'];?>" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
           <div class="form-group">
            <input name="name" type="hidden" class="form-control" value="<?php echo $details['name'];?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" value="<?php echo $details['password'];?>" placeholder="Password">
          </div>
          <div class="form-group">
            <label>About yourself</label>
            <textarea name="about_me" class="form-control" id="exampleTextarea" rows="5"><?php echo $details['about_me'];?></textarea>
          </div>
          <div class="form-group">
            <label>File input</label>
            <input name="file" type="file" class="form-control-file" id="exampleInputFile">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      <?php } else {?>
        <p> 
          <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;
          <a href="mailto:#"><?php echo $details['email'];?></a>
        </p></br>
        <p>
          <i class="fa fa-file-text-o" aria-hidden="true"></i>
          <?php echo $details['about_me'];?>
        </p>
      <?php }?>
    </div>
    <div class="col-md-offset-1 col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;
          General info
        </div>
        <div class="panel-body">
          <p> 
            <span class="no-padding-left col-md-10"> <i class="fa fa-line-chart" aria-hidden="true"></i>  &nbsp;User Score</span> <?php echo get_user_score($db, get_user_id($db, $_GET['name']));?>
          </p>
          <p> 
            <span class="no-padding-left col-md-10"> <i class="fa fa-question" style="color:#d9534f;" aria-hidden="true"></i> &nbsp;Questions asked</span> <?php echo count($user_asked_questions);?>
          </p>
          <p> 
            <span class="no-padding-left col-md-10"><i class="fa fa-check" style="color:#5cb85c;" aria-hidden="true"></i>&nbsp;Questions answered </span> <?php echo count($user_answered_questions);?>
          </p>
          <p>
            <span class="no-padding-left col-md-10"> <i class="fa fa-star" style="color:#f0ad4e;" aria-hidden="true"></i> &nbsp;Favourite Questions </span><?php echo count($user_star_questions);?>
          </p>
        </div>
      </div>
    </div>
</div>