	<!-- <div class="notifications">
		hello 	
	</div> -->
	<script type="text/javascript">
		$(document).ready(function() {
			var last_part = window.location.href.split('/').pop();
			last_part = "./"+last_part;
			$('.header_url a').each(function(key, value) {
				if( last_part === $(value).attr('href')) {
					$(this).parent().addClass('active');
				}
			});
		});
	</script>
	</body>
</html>