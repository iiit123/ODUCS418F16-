<?php include('../config.php'); ?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

	<div class="main_container container">
			<div class="row">

				<div class="col-md-9">

					<?php if(!isset($_SESSION['user_id'])) {?>
						<div class="alert alert-danger">
							please login to continue !
						</div>
					<?php } ?>


				<form action="../actions/insert/insert_question.php" method="post">
					<div class="form-group">
    					<input type="text" class="form-control" name="title" id="title" placeholder="Ask your question. Be specific.">
  					</div>
					<textarea name="question" id="text_editor"></textarea>
					 <div class="form-group">
    					<input type="text" class="form-control" name="tags" id="tags" placeholder="Enter the tags for the question seperated by comma (,)">
  					</div>

  						<?php if(!isset($_SESSION['user_id'])) {?>
							<button class="btn btn-primary" disabled> 
						<?php }  else {?>
							<button class="submit_ques btn btn-primary"> 
						<?php } ?>
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 							Post Your Question 
 						</button>
					</div>
				</form>

				<!-- how it works section -->
				<div class="col-md-2 col-md-offset-1">
					<p class="p-center">
						<img src = "../images/question.png"/> 
						<span class="help-block"> Questions ??? </span>
					</p>
					<p class="p-center"> 
						<img src = "../images/ask_question.png"/> 
						<span class="help-block"> Ask question </span>
					</p>
					<p class="p-center"> 
						<img src = "../images/idea.png"/> 
						<span class="help-block"> Get the solution </span>
					</p>
				</div>
			</div>
		</div>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
		<style>
			.p-center {
				text-align:center;
				margin-bottom: 50px;
			}

			.main_container {
				margin-top: 100px;
			}
		</style>
<?php include('script_files');?>
<script type="text/javascript">
	$(document).ready(function() {

		$('#text_editor').summernote({
  			height: 250	                 // set editor height
		});

		$('.submit_ques').click(function(e) {

			var title_result = check_length($('#title'), 15, "Title must be atleast 15 characters.");

			var question_result = check_length($('#text_editor'), 30,  "Body must be atleast 30 characters.");

			var tags_result = check_length($('#tags'), 1,  "There must be atleast one tag for the question");

			if(!(title_result && question_result && tags_result)) {
				e.preventDefault();
			}
				
		});

		
	});
</script>

<?php include('footer.php'); ?>
