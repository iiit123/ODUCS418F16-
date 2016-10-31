	<!-- <div class="notifications">
		hello 	
	</div> -->
	<script type="text/javascript">
		$(document).ready(function() {

			//used to highlight the navbar title which is clicked.
			var last_part = window.location.href.split('/').pop();
			last_part = "./"+last_part;
			$('.header_url a').each(function(key, value) {
				if( last_part === $(value).attr('href')) {
					$(this).parent().addClass('active');
				}
			});

			$(".dropdown-menu li a").click(function() {
				var active_class_name = $(this).parents(".btn-group").find('.fa').attr('class');
				var clicked_class_name = $(this).find('.fa').attr('class');

				var search_name = clicked_class_name.split('-')[1]
				
				var action = (search_name == "users") ? "./profile_page.php" : "./home_page.php"; 
				var input_name = (search_name == "users") ? "name" : "tag";


				$(this).parents(".btn-group").find('.fa').removeClass(active_class_name).addClass(clicked_class_name);
				$(this).find('.fa').removeClass(clicked_class_name).addClass(active_class_name);
				$(this).parents(".navbar-form").attr('action', action);

			
				$('#search_content').attr('placeholder', 'search for ' +  search_name);
				$('#search_content').attr('name', input_name);
			});


			$('#search_content').typeahead({        
         		source: function(query, process) { 
         			return $.get('../actions/get/get_user_details.php', {name: $('#search_content').val(), match_case: 'true'}, function(response) {
         				return process(response);
         			},'json')
         		}
			});    


		});
	</script>
	</body>
</html>