<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
?>
<?php include('../config.php'); ?>
<?php 
	ob_start();
    include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","PROFILE PAGE",$buffer);
    echo $buffer;
?>
<?php include('navbar.php'); ?>
<?php include('../actions/get/get_user_asked_questions.php'); ?>
<?php include('../actions/get/get_user_star_questions.php'); ?>
<?php include('../actions/get/get_user_answered_questions.php'); ?>

<div class="main_container container">
	<div class="row">
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#home">
				<i class="fa fa-user" aria-hidden="true"></i>
				Profile
				</a>
			</li>
		   	<li>
		   		<a data-toggle="tab" href="#menu1">
		   			<i class="fa fa-question" aria-hidden="true"></i>
					Questions
				</a>
			</li>
		    <li>
		    	<a data-toggle="tab" href="#menu2">
		    		<i class="fa fa-check" aria-hidden="true"></i>
					Answers
				</a>
			</li>
		    <li>
		    	<a data-toggle="tab" href="#menu3">
		    		<i class="fa fa-star" aria-hidden="true"></i>
		    		Favourites
		    	</a>
		    </li>
		</ul>
		<div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		      		<?php include('./edit_profile.php');?>
		    </div>
		    <div id="menu1" class="tab-pane fade">
				<ul style="padding-left:20px;" class="list-unstyled">
					<li>
		      		<?php
		      		if(isset($user_asked_questions)) {
		      			foreach ($user_asked_questions as $key => $row) { 
		      				$created_at = date('d-M-Y', strtotime($row['created_at']));
							$tags = explode(',', $row['tags']);
							?>
				      		<p> <a href="./individual_question.php?ques_id=<?php echo $row['ques_id'];?>"><?php echo $row['title']; ?></a> </p>
							<div style="margin-bottom:30px;" class="row">
								<div class="col-md-5">
									<?php foreach($tags as $key => $tag) {?>
										<a class="no_underline" href="./home_page.php?tag=<?php echo trim($tag) ?>">
											<span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span>
										</a>
									<?php }?>
								</div>
								<div class="col-md-2">
									<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
									votes  <?php echo $row['likes_count'];?>
								</div>
								<div class="col-md-3">
									<i class="fa fa-file-text-o" aria-hidden="true"></i>
									answers count  <?php echo $row['answers_count'];?>
								</div>
								<div class="col-md-2">
									<i class="fa fa-eye" aria-hidden="true"></i>
									views  <?php echo $row['views']; ?>
								</div>
							</div>
		      			<?php }
		      		}
		      		else { ?>
		      				You have not asked any question yet.
		      		<?php } ?>
		      		</li>
		      	</ul>
		    </div>
		    <div id="menu2" class="tab-pane fade">
		  		<ul style="padding-left:20px;" class="list-unstyled">
		  			<li>
		      		<?php
		      		if(isset($user_answered_questions)) {
		      			foreach ($user_answered_questions as $key => $row) { 
		      				$created_at = date('d-M-Y', strtotime($row['created_at']));
							$tags = explode(',', $row['tags']);
							?>
							<p> <a href="./individual_question.php?ques_id=<?php echo $row['ques_id'];?>"><?php echo $row['title']; ?></a> </p>
							<div style="margin-bottom:30px;" class="row">
								<div class="col-md-5">
									<?php foreach($tags as $key => $tag) {?>
										<a class="no_underline" href="./home_page.php?tag=<?php echo $tag ?>">
											<span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span>
										</a>
									<?php }?>
								</div>
								<div class="col-md-2">
									<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
									votes  <?php echo $row['likes_count'];?>
								</div>
								<div class="col-md-3">
									<i class="fa fa-file-text-o" aria-hidden="true"></i>
									answers count  <?php echo $row['answers_count'];?>
								</div>
								<div class="col-md-2">
									<i class="fa fa-eye" aria-hidden="true"></i>
									views  <?php echo $row['views']; ?>
								</div>
							</div>
		      			<?php }
		      		}
		      		else { ?>
		      				You have not answered any questions	
					<?php } ?>
					</li>
		      	</ul>
		    </div>
		    <div id="menu3" class="tab-pane fade">
		      <ul style="padding-left:20px;" class="list-unstyled">
		      	<li>
		     	 <?php
		      		if(isset($user_star_questions)) {
		      			foreach ($user_star_questions as $key => $row) { 
		      				$created_at = date('d-M-Y', strtotime($row['created_at']));
							$tags = explode(',', $row['tags']);
							?>
							<p> <a href="./individual_question.php?ques_id=<?php echo $row['ques_id'];?>"><?php echo $row['title']; ?></a> </p>
							<div style="margin-bottom:30px;" class="row">
								<div class="col-md-5">
									<?php foreach($tags as $key => $tag) {?>
										<a class="no_underline" href="./home_page.php?tag=<?php echo $tag ?>">
											<span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span>
										</a>
									<?php }?>
								</div>

								<div class="col-md-2">
									<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
									votes  <?php echo $row['likes_count'];?>
								</div>
								<div class="col-md-3">
									<i class="fa fa-file-text-o" aria-hidden="true"></i>
									answers count  <?php echo $row['answers_count'];?>
								</div>
								<div class="col-md-2">
									<i class="fa fa-eye" aria-hidden="true"></i>
									views  <?php echo $row['views']; ?>
								</div>
							</div>
		      			<?php }
		      		}
		      		else { ?>
		      				You have not marked any questions as favourite.	
		      		<?php } ?>
		      		</li>
		      	</ul>
		    </div>
		</div>
	</div>
</div>

<?php include('script_files');?>
<?php include('footer.php'); ?>
	
