<?php include('../config.php'); ?>
<?php 
	if(isset($_SESSION['admin']) != 1){
        header('location:page_not_found.php');
    }
?> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" crossorigin="anonymous">
<?php include('../actions/get/get_user_details.php');?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<div class="main_container container">
	<div class="row">
		<div class="col-md-12">
			<legend><h3>Users</h3></legend>
			<table id="users_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>User Id</th>
		                <th>Name</th>
		                <th>Email</th>
		                <th>Question Asked</th>
		                <th>Score</th>
		                <th>Joined on</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php 
						if(isset($user_details)) {
			        		foreach($user_details as $row) {
								$created_at = date('d-M-Y', strtotime($row['created_at']));
					?>
							<tr class="table-row">
								<td class="ques_id"><?php echo $row['user_id'];?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['questions_count'];?></td>
								<td><?php echo get_user_score($db, $row['user_id']);?></td>
								<td><?php echo $created_at;?></td>
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
	$(document).ready(function() {
        window.datatable = $('#users_table').DataTable();
    });
</script>
<?php include('footer.php') ?>