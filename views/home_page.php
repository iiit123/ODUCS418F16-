<?php include('../config.php'); ?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('../actions/get/get_all_questions.php');?>

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


					<h4> Recent Questions  </h4> <hr/>
					<?php 
						foreach($rows as $row) {
							$created_at = date('d-M-Y', strtotime($row['created_at']));
							$tags = explode(',', $row['tags']);

					?>
					<p> <a href="./individual_question.php?ques_id=<?php echo $row['ques_id'];?>"><?php echo $row['title']; ?></a> </p>
					<div style="margin-bottom:30px;" class="row">
						<div class="col-md-6">
							<?php foreach($tags as $key => $tag) {?>
								<span class="pointer label label-<?php echo $labels[$key%6];?>"><?php echo $tag ?></span>
							<?php }?>
						</div>
						<div class="col-md-2">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
							<i>votes</i>  <?php echo $row['likes_count'];?>
						</div>
						<div class="col-md-2">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							<i>answers</i>  12
						</div>
						<div class="col-md-2">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<i>views</i>  <?php echo $row['views']; ?>
						</div>
					</div>
				<?php } ?>
				</div>
				<div class="col-md-3 col-md-offset-1" style="margin-top:10px;">
					<div class="panel panel-default">
  						<div class="panel-heading">
  							<i class="fa fa-line-chart" aria-hidden="true"></i>
  							Trending Tags
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
				$('.alert').fadeOut(1600);
			});
	</script>
<?php include('footer.php') ?>