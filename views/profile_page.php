<?php include('../config.php'); ?>
<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<title> Profile Page </title>
<div class="main_container container">
	<div class="row">
		<h3><?php echo $_GET['name']; ?></h3> <br/>
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#home">
				<i class="fa fa-user" aria-hidden="true"></i>
				Profile
				</a>
			</li>
		   	<li>
		   		<a data-toggle="tab" href="#menu1">
		   			<i class="fa fa-question" aria-hidden="true"></i>
					Questions
				</a>
			</li>
		    <li>
		    	<a data-toggle="tab" href="#menu2">
		    		<i class="fa fa-check" aria-hidden="true"></i>
					Answers
				</a>
			</li>
		    <li>
		    	<a data-toggle="tab" href="#menu3">
		    		<i class="fa fa-star" aria-hidden="true"></i>
		    		Favourites
		    	</a>
		    </li>
		</ul>
		<div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		      <h3>HOME</h3>
		      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		    </div>
		    <div id="menu1" class="tab-pane fade">
		      <h3>Menu 1</h3>
		      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div>
		    <div id="menu2" class="tab-pane fade">
		      <h3>Menu 2</h3>
		      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
		    </div>
		    <div id="menu3" class="tab-pane fade">
		      <h3>Menu 3</h3>
		      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
		    </div>
		</div>
	</div>
</div>

<?php include('script_files');?>
<?php include('footer.php'); ?>
	
