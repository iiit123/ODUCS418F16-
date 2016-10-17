<?php
	
	/**
	 * { checks userlogin status. }
	 */
	if($USER_ID == undefined) {	
		header('location: ./views/login_view.php');
		exit();
	}
	
?>