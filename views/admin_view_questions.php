<?php include('../config.php'); ?>
<?php 
	if(isset($_SESSION['admin']) != 1){
        header('location:page_not_found.php');
    }
?> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" crossorigin="anonymous">
<?php $type="Admin All Questions";?>
<?php include('../actions/get/get_all_questions.php');?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<div class="main_container container">
	<div class="row">
		<div class="col-md-12">
			<legend><h3>Questions</h3></legend>
			<table id="questions_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Ques Id</th>
		                <th>Title</th>
		                <th>Created at</th>
		                <th style="display:none !important;">Edit</th>
		               	<th style="display:none !important;">Freeze</th>
		                <th style="display:none !important;">Delete</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php 
						if(isset($questions)) {
			        		foreach($questions as $row) {
								$created_at = date('d-M-Y', strtotime($row['created_at']));
					?>
							<tr class="table-row">
								<td class="ques_id"><?php echo $row['ques_id'];?></td>
								<td><?php echo $row['title'];?></td>
								<td><?php echo $created_at;?></td>
								<td>
									<a href="./admin_edit_question.php?ques_id=<?php echo $row['ques_id'];?>">
										<button class="btn btn-primary edit">
										<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
										</button>
									</a>
								</td>
								<td>
									<?php if($row['freeze_flag'] == 0) { ?>
										<button class="btn freeze">
											<i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;Freeze
										</button>
									<?php } else { ?>
										<button class="btn btn-info freeze">
											<i class="fa fa-play" aria-hidden="true"></i>&nbsp;Unfreeze
										</button>	
									<?php }?>
								</td>
								<td>
									<button class="btn btn-danger delete">
										<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete
									</button>
								</td>
							</tr>
		        	<?php } } ?>
		        </tbody>
		    </table>
		</div>
	</div>
</div>
<?php include('script_files');?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$('body').on('click','.delete', function(e){
    	var ques_id = $(this).parent().siblings('.ques_id').text();
    	var _this = this;
    	$.post('../actions/delete/delete_question.php', {'ques_id': ques_id}, function(response) {
   			if(response) {
   				$(_this).parents('.table-row').hide();
   			}
    	});
    });

    $('body').on('click','.freeze', function(e){
    	var ques_id = $(this).parent().siblings('.ques_id').text();
    	var _this = this;
    	$.post('../actions/update/freeze_question.php', {'ques_id': ques_id}, function(response) {
   			if(response) {
   				$(_this).toggleClass('btn-info');
   				if($(_this).hasClass('btn-info')) {
   					$(_this).html('<i class="fa fa-play" aria-hidden="true"></i>&nbsp;Unfreeze');
   				}
   				else {
   					$(_this).html('<i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;Freeze');
   				}
   			}
    	});
    });

	$('body').on('click', '.edit', function(e) {

	});

	$(document).ready(function() {
        window.datatable = $('#questions_table').DataTable();
    });
</script>
<?php include('footer.php') ?>