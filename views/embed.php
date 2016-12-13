<?php include('../config.php'); ?>
<?php $type="Admin All Questions";?>
<?php include('../actions/get/get_all_questions.php'); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style>
		.label:hover{
				font-size: 12px;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row autoscroll">
				<div class="col-md-12 col-sm-12">
					<?php if(!isset($questions)) { ?>
						<div style="width:80%; height:60%;">
							<div class="no_content_found"></div>
						</div>
					<?php } else {
						foreach($questions as $row) {
							$created_at = date('d-M-Y', strtotime($row['created_at']));
							$tags = explode(',', $row['tags']);

					?>
					<p> <a target="_blank" href="./individual_question.php?ques_id=<?php echo $row['ques_id'];?>"><?php echo $row['title']; ?></a> </p>
					<div style="margin-bottom:30px;" class="row">
						<div class="col-md-3 col-sm-1">
							<?php foreach($tags as $key => $tag) {?>
								<a target="_blank" class="no_underline" href="./home_page.php?tag=<?php echo trim($tag); ?>"><span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span></a>
							<?php }?>
						</div>
					</div>
					<hr/>
					<?php } }?>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script type="text/javascript">
		$(function() {
			var page_number = 1;
			console.log($(document).height() - $(window).height());
			$('html, body').animate({ scrollTop: $(document).height() - window.innerHeight }, 10000, function(){
			    	$(this).animate({ scrollTop: 0 }, 1000);
			});
		});
	</script>
</html>