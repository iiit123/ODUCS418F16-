<?php include('../config.php'); ?>
<?php include('../actions/get/get_all_questions.php');?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" crossorigin="anonymous">

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
										<a href="">
											<button class="btn btn-primary edit">
												<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
											</button>
										</a>
									</td>
									<td>
										<button class="btn btn-info freeze">
											<i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;Freeze
										</button>
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
    	$.post('../actions/update/freeze_question.php', {'ques_id': ques_id, "freeze_flag": "1"}, function(response) {
   			if(response) {

   			}
    	});
    });

    $('body').on('click','.unfreeze', function(e){
    	var ques_id = $(this).parent().siblings('.ques_id').text();
    	var _this = this;
    	$.post('../actions/update/freeze_question.php', {'ques_id': ques_id, "freeze_flag": "0"}, function(response) {
   			if(response) {
   				
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