<?php include('../config.php'); ?>
<?php 
	if(isset($_SESSION['admin']) != 1){
        header('location:page_not_found.php');
    }
?> 
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<div class="main_container container">
	<div class="row">
		<div class="col-md-9">
			<legend><h3>Edit Question</h3></legend>
			<form action="../actions/update/update_question.php" method="post">
				<input type="hidden" name="ques_id" value="<?php echo $_GET['ques_id'];?>"/>
				<div class="form-group">
					<input type="text" class="form-control" name="title" id="title" placeholder="Ask your question. Be specific.">
				</div>
				<textarea name="question" id="text_editor"></textarea>
			 	<div class="form-group">
					<input type="text" class="form-control" name="tags" id="tags" placeholder="Enter the tags for the question seperated by comma (,)">
				</div>
				<button class="submit_ques btn btn-primary"> 
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					Post Your Question 
				</button>
			</form>
		</div>
	</div>
</div>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<?php include('script_files');?>
<script type="text/javascript">
	$(document).ready(function() {

		$('#text_editor').summernote({
  			height: 250	                 // set editor height
		});

		$.get('../actions/get/get_individual_question.php', {'ques_id': <?php echo $_GET['ques_id']?>, 'request_type':'ajax'}, function(response) {
				$('#title').val(response['title']);
				$('#text_editor').summernote('code', response['question']);
				$('#tags').val(response['tags']);
		},'json');

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
<?php include('footer.php') ?>