<?php include('../config.php'); ?>
<?php 
	ob_start();
    include("header.php");
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%","HOME PAGE",$buffer);
    echo $buffer;
?>
<?php include('navbar.php'); ?>
<?php 
	if(isset($_GET['tag'])) {
		include('../actions/get/get_tag_related_questions.php');
	}
	else {
		include('../actions/get/get_all_questions.php');
	}
?>
		<div class="main_container container">
			<div class="row">
				<div class="col-md-8">
					<?php if(isset($_SESSION['user_id']) && isset($_GET['login'])) {
                        echo '<div class="alert alert-success">
                            You have been successfully logged in !
                        </div>';
                    }?>

                    <?php if(!isset($_SESSION['user_id']) && isset($_GET['logout'])) {
                        echo '<div class="alert alert-warning">
                            You have been successfully logged out !
                        </div>';
                    }?>


                    <?php if(isset($_GET['tag'])) { ?>
						<h4> <?php echo $_GET['tag'];?> Questions  </h4> <hr/>
					<?php } else { ?>
						<div class="pull-left"><h4> <span id="q_type_heading"> Top Questions </span></h4></div>
								<div class="dropdown pull-right">
								  <button id="select_ques_type" class="btn select_question_type btn-default dropdown-toggle" type="button" data-toggle="dropdown">Select type
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu menu_questions_type">
								  	<li><a id="All_Questions" class="question_type" href="#">All Questions</a></li>
								    <li><a id="Top_Questions" class="question_type" href="#">Top Questions</a></li>
								    <li><a id="Recent_Questions" class="question_type" href="#">Recent Questions</a></li>
								   </ul>
								</div>
						<br/>
						<hr/>
					<?php } ?>
					
					<?php if(!isset($questions)) { ?>
						<div style="width:80%; height:60%;">
							<div class="no_content_found"></div>
						</div>
					<?php } else {
						foreach($questions as $row) {
							$created_at = date('d-M-Y', strtotime($row['created_at']));
							$tags = explode(',', $row['tags']);

					?>

					<p> <a href="./individual_question.php?ques_id=<?php echo $row['ques_id'];?>"><?php echo $row['title']; ?></a> </p>
					<div style="margin-bottom:30px;" class="row">
						<div class="col-md-5">
							<?php foreach($tags as $key => $tag) {?>
								<a class="no_underline" href="./home_page.php?tag=<?php echo trim($tag); ?>"><span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span></a>
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
				<?php } }?>
					<div class="row pagination_row">
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1" style="margin-top:10px;">
					<div class="panel panel-default">
  						<div class="panel-heading">
  							<i class="fa fa-line-chart" aria-hidden="true"></i>
  							Trending Tags <span style="margin-left:10px;" class="pointer label label-info">Next Update</span>
  						</div>
  						<div class="panel-body">
  							<ul class="list-group">
  								<li class="list-group-item">
  									<span class="badge">5</span>
    									Javascript
  								</li>
  							</ul>
  						</div>
					</div>
				</div>
			</div>
		</div>

	<?php include('script_files');?>
	<script type="text/javascript">
			$(document).ready(function () {

				var type = decodeURIComponent($.trim(get_url_params('type')));
				type.replace('_', ' ');

				var current_page = parseInt(decodeURIComponent($.trim(get_url_params('page_number'))));
				if(!current_page) {
					current_page = 1;
				}

				if(type == "All Questions") {

					$.get('../actions/get/get_questions_count.php', function(response) {
						var questions_count = response['questions_count'];
						var pagination_li = "";

						var pagination_col = "";
						i=0;
						for(i=current_page-1;i<current_page + 2, i<questions_count/5; i++) {
							if(i+1 == current_page) {
								pagination_col += '<li id="page_number_'+(i+1)+'" class="active pagination_number"><a href="./home_page?type=All Questions&page_number='+ (i+1) +'">'+ (i+1) +'</a></li>';
							}
							else {
								pagination_col += '<li id="page_number_'+(i+1)+'" class="pagination_number"><a href="./home_page?type=All Questions&page_number='+ (i+1) +'">'+ (i+1) +'</a></li>';
							}
						}
						var pagination_col_before = '<div class="col-md-6 col-md-offset-4"><ul class="pagination">'
						if(current_page == 1) {
							pagination_col_before += '<li class="disabled previous"><a>Previous</a></li>';

						}
						else {
							pagination_col_before += '<li class="previous"><a href="./home_page?type=All Questions&page_number='+ eval(current_page-1) +'">Previous</a></li>';
						}
						var pagination_col_after = "";
						if(current_page >= questions_count/5){
							pagination_col_after += '<li class="disabled next"><a>Next</a></li></ul></div>';

						}
						else {
							pagination_col_after += '<li class="next"><a href="./home_page?type=All Questions&page_number='+ eval(current_page+1) +'">Next</a></li></ul></div>';

						}
						pagination_col = pagination_col_before + pagination_col + pagination_col_after;

						$('.pagination_row').after(pagination_col);
					}, 'json');

					$('body').on('click', '.pagination_number', function() {
						$('.pagination_number').removeClass('active');
						$(this).addClass('active');
					});

					$('.previous, .next').click(function() {
						$('.pagination_number').removeClass('active');
					});
				}


				$('.alert').fadeOut(1600);

				var type = decodeURIComponent($.trim(get_url_params('type')));


			    if(type){
			    	$('#q_type_heading').text(type);
					$(".select_question_type:first-child").text(type);
				    $(".select_question_type:first-child").val(type);
			    }

				$(".menu_questions_type li a").click(function() {
			    	$(".select_question_type:first-child").text($(this).text());
			    	$(".select_question_type:first-child").val($(this).text());
				});

				$(".question_type").click(function() {
					var type = $(this).text();
					window.location.href = "./home_page.php?type=" + type;
				});

			});

		
	</script>
<?php include('footer.php') ?>