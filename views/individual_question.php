<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('../actions/get/get_individual_question.php');?>
<?php include('../actions/update/update_individual_question.php'); ?>
<?php include('../actions/get/get_answers.php'); ?>

<?php update_question_views($db, $_GET['ques_id']); ?>
		<div class="main_container container">
			<div class="row">
				<h3> <?php echo $title;?>  </h3> <hr>
				<div class="col-md-8">
					<div style="margin-bottom:30px;" class="row">
						<div class="col-md-1 text-center">
							<i class="fa fa-thumbs-up fa-2x up_vote" aria-hidden="true"></i>
							<p class="help-block likes_count"> 100 </p>
							<i class="fa fa-thumbs-down fa-2x down_vote" aria-hidden="true"></i> <br/> </br>
							<i class="fa fa-star fa-2x favourite" aria-hidden="true"></i>
						</div>
						<div class="col-md-10">
							<p class="content">	
								<?php echo $question; ?>
							</p>	
							<p>

								<?php 
								foreach($tags as $key => $tag) {?>
									<span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span>
								<?php }?>
								<span style="margin-left:30px;" class="pull-right">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<?php echo $created_at ;?>
								</span>
								<span class="pull-right">
									<i class="fa fa-eye" aria-hidden="true"></i>
									views - <?php echo $views; ?>
								</span>		
							</p>
							</br>
							<p>
								<a href="#"> <i style="color:black;" class="fa fa-user" aria-hidden="true"></i> <?php echo $email ;?> </a>
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
							<h4> <?php echo $answers_count ;?> Answers  </h4> 
						<?php }?>

						<?php if($answers_count != 0) { 
							foreach($answers as $key => $answer) {?>
						<hr/>
						<div class="row">
							<div class="col-md-1 text-center">
									<i class="fa fa-thumbs-up fa-2x up_vote" aria-hidden="true"></i>
									<p class="help-block likes_count"> 100 </p>
									<i class="fa fa-thumbs-down fa-2x down_vote" aria-hidden="true"></i> <br/>  </br>
									<i class="fa fa-check fa-2x correct" aria-hidden="true"></i>
							</div>
							<div class="col-md-10">
								<p><?php echo $answer['answer']; ?></p>
								<p>
									<span>
										<a href="#"> <i style="color:black;" class="fa fa-user" aria-hidden="true"></i> <?php echo $answer['email'] ;?> </a>
									</span>
									<span class="pull-right">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<?php echo date('d-M-Y', strtotime($answer['created_at'])) ;?>
									</span>
								</p>
							</div>
						</div>
						<?php }} ?>
					</div>
					</br></br>
					<div class="row">
						<h4> Your Answer </h4> <hr/>
						<div class="col-md-12">
							<p style="display:none;" class="alert alert-success ans_success">Your answer has been successfully posted!</p>
							<textarea name="question" id="text_editor"></textarea>
							<button class="answer_submit btn btn-primary"> 
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								Post Your Answer 
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<h4 style="margin-top:0px;"> Related </h4> <hr/>
					<p><a class="link"> C++11 trailing return member function using decltype and constness </a> </p>
					<p> <a class="link"> Trailing return types, decltype and const-ness </a></p>
				</div>
			</div>
		</div>
		
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
		<?php include('script_files'); ?>
		<script>
			function update_likes_counter(value) {
				var likes_count = parseInt($('.likes_count').text()) + value;
				$('.likes_count').text(likes_count);
			}

			function edit_content(_this) {
				var para_text = $(_this).parent().siblings('.content');
				var text = para_text.text();
				var input = '<textarea class="content form-control" rows="5" >'+ text +'</textarea>';
				para_text.html(input);

				$(_this).siblings('.done').show();
				$(_this).hide();
			}

			function done_content(_this) {
				$(_this).siblings('.edit').show();
				$(_this).hide();

				var para_text = $(_this).parent().siblings('.content');
				var text = para_text.text();
				para_text.html(text);

			}

			$(document).ready(function() {

				$('.ans_success').hide();

				$('#text_editor').summernote({
  					height: 250,                 // set editor height
  					focus: true                  // set focus to editable area after initializing summernote
				});

				$(".answer_submit").click(function(e) {

					var result = check_length($('#text_editor'), 30, "Answer must be atleast 30 characters");

					if(result) {
						e.preventDefault();
						$.post('../actions/insert/insert_answer.php', {'ques_id': <?php echo $_GET['ques_id'] ?>, 'answer': $('#text_editor').val()}, function(response) {
							if(response) {
								$('.ans_success').show().fadeOut(1600);
								$('.answer_container').append('<hr/><div class="row">'
										+'<div class="col-md-1 text-center">'
											+'<i class="fa fa-thumbs-up fa-2x up_vote" aria-hidden="true"></i>'
											+'<p class="help-block likes_count"> 0 </p>'
											+'<i class="fa fa-thumbs-down fa-2x down_vote" aria-hidden="true"></i> <br/>  </br>'
											+'<i class="fa fa-check fa-2x correct" aria-hidden="true"></i>'
										+'</div>'
										+'<div class="col-md-10">'
											+'<p>'+$('#text_editor').val()+'</p>'
											+'<p><span>'
												+'<a href="#"> <i style="color:black;" class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['email'] ;?> </a>'
											+'</span><span class="pull-right">'
												+'<i class="fa fa-calendar" aria-hidden="true"></i> '
												+ get_current_date()
												+'</span>'
											+'</p>'
										+'</div>'
								+'</div>');
								$('#text_editor').summernote('code', '');
							}
						});
					}
				});

				$('.fa-thumbs-up').click(function() {
					$.post('../actions/update/update_likes_count.php', {'ques_id': <?php echo $_GET['ques_id']; ?>, 'user_id': <?php echo $_SESSION['user_id']; ?>, 'like_flag': 1}, function(response) {
						update_likes_counter(1);
						$('.up_vote').addClass('text-success');
						$('.down_vote').removeClass('text-danger');
					});
				});

				$('.fa-thumbs-down').click(function() {
					$.post('../actions/update/update_likes_count.php', {'ques_id': <?php echo $_GET['ques_id']; ?>, 'user_id': <?php echo $_SESSION['user_id']; ?>, 'like_flag': -1}, function(response) {
						if(response) {
							update_likes_counter(-1);
							$('.up_vote').removeClass('text-success');
							$('.down_vote').addClass('text-danger');
						}
					});
				});

				$('.favourite').click(function() {
					$( this ).toggleClass( "text-warning" );
				});

				$('.correct').click(function() {
					$(this).toggleClass("text-success");
				});

				$('.edit').click(function() {
					edit_content(this);
				});
 			
 				$('.done').click(function() {
					done_content(this);
				});
 			
 			});

		</script>

<?php include('footer.php'); ?>