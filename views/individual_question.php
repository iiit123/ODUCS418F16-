<?php include('../config.php'); ?>
<?php include('../actions/get/get_individual_question.php');?>
<?php include('../actions/update/update_views.php'); ?>
<?php include('../actions/get/get_answers.php'); ?>
<?php 
	ob_start();
    include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","INDIVIDUAL PAGE",$buffer);
    echo $buffer;
?>
<?php include('navbar.php'); ?>
<?php 
	if(!isset($_GET['page_number'])) {
		$page_number = 1;
	}
	else {
		$page_number = $_GET['page_number'];
	} 
?>

<?php update_question_views($db, $_GET['ques_id']); ?>
		<div class="main_container container">
			<div class="row">
				<h3> <?php echo $title;?>  </h3> <hr>
				<div class="col-md-9">
					<div style="margin-bottom:30px;" class="row">
						<div class="col-md-1 text-center">
							<i id="question_upvote" class="fa fa-thumbs-up fa-2x up_vote" aria-hidden="true"></i>
							<p class="help-block likes_count"> <?php echo $likes_count; ?> </p>
							<i id="question_downvote" class="fa fa-thumbs-down fa-2x down_vote" aria-hidden="true"></i> <br/> <br/>
							<i class="fa fa-star fa-2x favourite" aria-hidden="true"></i>
						</div>
						<div class="col-md-10 content">
							<p style="display:none;" class="question_warning alert alert-warning message"></p>
							<?php echo '<div class="content">'.$question.'</div>'; ?>	
							<p>

								<?php
								if($tags!="") { 
									foreach($tags as $key => $tag) {?>
									<a class="no_underline" href="./home_page.php?tag=<?php echo trim($tag) ?>">
										<span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo trim($tag);?></span>
									</a>
								<?php }
								}?>
								<span style="margin-left:30px;" class="pull-right">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<?php echo $created_at ;?>
								</span>
								<span class="pull-right">
									<i class="fa fa-eye" aria-hidden="true"></i>
									views - <?php echo $views; ?>
								</span>		
							</p>
							<br/>
							<p>
								<a href="./profile_page.php?name=<?php echo $name ;?>"> <img alt="profile_pic" width="30" height="30" src="<?php echo get_image_url($db, $name);?>"/> <?php echo $name ;?></a> <i style="color:gold" class="fa fa-circle" aria-hidden="true"></i>
<?php echo get_user_score($db, $asker_id);?>
								<a style="margin-left:25px;" class="link pull-right" href="#"> report abuse </a>
								<a class="edit link pull-right" href="#">edit </a> &nbsp;
								<a class="done link pull-right" style="display: none;" href="#">done </a> &nbsp;	
							</p>
						</div>
					</div>

					<!-- Answers section -->
					<br/>

					<div class="answer_container">
						<?php if($answers_count != 0) { ?>
							<h4> <span id="ans_count"><?php echo $answers_count ;?></span> Answers  </h4> 
						<?php }?>

						<?php if(isset($answers)) { 
							foreach($answers as $key => $answer) {?>
						<hr/>
						<div class="row">
							<div class="col-md-1 text-center">
								<input class="ans_id_input" type="hidden" value="<?php echo $answer['ans_id'] ?>" />
								<i id="ans_upvote_<?php echo $answer['ans_id'];?>"class="fa fa-thumbs-up fa-2x up_vote answer_vote" aria-hidden="true"></i>
								<p class="help-block likes_count"><?php echo $answer['likes_count'];?></p>
								<i id="ans_downvote_<?php echo $answer['ans_id'];?>" class="fa fa-thumbs-down fa-2x down_vote answer_vote" aria-hidden="true"></i> <br/> <br/>

								<?php if($answer['is_correct'] && $asker_id == $USER_ID && $freeze_flag != 1) { ?>
									<i class="fa fa-check fa-2x correct text-success" aria-hidden="true"></i>
								<?php } else if($answer['is_correct'] && ($asker_id != $USER_ID  || $freeze_flag ==1 )) {?>
									<i class="fa fa-check fa-2x text-success" style="cursor:default;"aria-hidden="true"></i>
								<?php } elseif($asker_id == $USER_ID && $freeze_flag!=1) { ?>
									<i class="fa fa-check fa-2x correct" aria-hidden="true"></i>			
								<?php }?>
								<input type="hidden" class="hidden_id" value="<?php echo $answer['ans_id'];?>" />
							</div>
							<div class="col-md-10 content">
								<p style="display:none;" class="alert alert-warning message"></p>
                            	<p><?php echo decode_data($answer['answer']); ?></p>
								<p>
									<span>
										<a href="./profile_page.php?name=<?php echo $answer['name'];?>"> <img width="30" height="30" src="<?php echo get_image_url($db, $answer['name']);?>"/> <?php echo $answer['name'] ;?> </a><i style="color:gold" class="fa fa-circle" aria-hidden="true"></i>
<?php echo get_user_score($db, $answer['user_id']);?>
									</span>
									<span class="pull-right">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<?php echo date('d-M-Y', strtotime($answer['created_at'])); ?>
									</span>
								</p>
							</div>
						</div>
						<?php }} ?>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-4">
							<ul class="pagination">

								<?php 
									if($answers_count != 0) { 
										if($page_number-1 <= 0) {?>
							 	 	<li class="disabled"><a>Previous</a></li>
							 	 <?php } else { ?>
							 	 	<li><a href="./individual_question.php?ques_id=<?php echo $_GET['ques_id']?>&page_number=<?php echo $page_number-1;?>">Previous</a></li>
							 	 <?php } }?>

							  	<?php for($i=$page_number-1; $i<$answers_count+2, $i<($answers_count/5); $i++) {
									if($i+1 == $page_number) {
							 	 		echo '<li class="active">';
							 	 	}
							 	 	else {
							 	 		echo '<li>';
							 	 }?>
							 	 <a href="./individual_question.php?ques_id=<?php echo $_GET['ques_id']?>&page_number=<?php echo $i+1;?>"><?php echo $i+1; ?></a></li>
							  <?php }?>
							 
							    <?php
							    	if($answers_count !=0 ) {  
							    		if($page_number >= $answers_count/5) {?>
							 	 			<li class="disabled"><a>Next</a></li>
							 	 		<?php } else { ?>
							 	 	<li><a href="./individual_question.php?ques_id=<?php echo $_GET['ques_id']?>&page_number=<?php echo $page_number+1;?>">Next</a></li>
							 	<?php } }?>
							</ul>
						</div>
					</div>
					<br/><br/>
					<?php if($freeze_flag != 1) { ?>
					<div class="row">
						<h4> Your Answer </h4> <hr/>
						<div class="col-md-12">
							<p style="display:none;" class="alert alert-success ans_success">Your answer has been successfully posted!</p>
							<textarea name="question" id="text_editor"></textarea>
							<?php if(!isset($_SESSION['user_id'])) {?>
								<button class="btn btn-primary" disabled> 
							<?php }  else {?>
								<button class="answer_submit btn btn-primary"> 
							<?php } ?>
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								Post Your Answer 
							</button>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-3">
					<h4 style="margin-top:0px;"> Related <span style="font-size:10px;margin-left:10px;" class="pointer label label-info">Next Update</span> </h4> <hr/>
					<p><a class="link"> C++11 trailing return member function using decltype and constness </a> </p>
					<p> <a class="link"> Trailing return types, decltype and const-ness </a></p>
				</div>
			</div>
		</div>
		
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<?php include('script_files'); ?>
<script type="text/javascript">
	var ques_id = <?php echo $_GET['ques_id']; ?>;
	var user_id = <?php echo $USER_ID;?>;
	var asker_id = <?php echo $asker_id;?>;
	var tags = <?php print_r(json_encode($tags));?>;
	var name = '<?php echo $_SESSION["name"] ;?>'; 
</script>
<script type="text/javascript" src="../js/individual_question.js"></script>
<?php include('footer.php'); ?>