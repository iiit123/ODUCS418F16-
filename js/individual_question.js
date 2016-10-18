/**
 * { updates like counter in the page }
 *
 * @param      {object}  _this   The jquery object
 * @param      {integer}  value  The int which has to be added
 */
function update_likes_counter(_this, value) {
	var likes_count = parseInt($(_this).siblings('.likes_count').text()) + value;
	$(_this).siblings('.likes_count').text(likes_count);
}

/**
 * { edit question change to textarea }
 *
 * @param      {object}  _this   The jquery object
 */
function edit_content(_this) {
	var para_text = $(_this).parent().siblings('.content');
	var text = para_text.text();
	var input = '<textarea id="edit_ques" class="edit_content_question form-control" rows="5" ></textarea>';

	para_text.html(input);

	$('#edit_ques').summernote({
		  height: 300          
	});

	$('#edit_ques').summernote('code', text);


	$(_this).siblings('.done').show();
	$(_this).hide();
}

/**
 * { save the content after it has been edited}
 *
 * @param      {object}  _this   The jquery object
 */
function done_content(_this) {

	$.post('../actions/update/update_individual_question.php', {'ques_id': ques_id, "question": $('.edit_content_question').val()}, function(response) {
		if(response) {
			$(_this).siblings('.edit').show();
			$(_this).hide();
			var para_text = $(_this).parent().siblings('.content');
			var text = $('.edit_content_question').val();
			para_text.html(text);
			$('.question_warning').html('Your question has been sucessfully updated!').show().fadeOut(2000);
		}
		else {
			$('.question_warning').html('Something went wrong. Please try again!').show().fadeOut(2000);
		}

	});
}

$(document).ready(function() {

	$('.ans_success').hide();

	// $.each(tags, function(key, tag){
	// 	$.get('../actions/get/get_tag_related_questions.php', {'tag':tag}, function(response){
	// 		console.log(response);
	// 	})
	// });

	$.get('../actions/get/get_like_details.php', {'ques_id': ques_id}, function(response) {
		if(response['like_flag'] == 1) {
			$('.up_vote').addClass('text-success');
		}
		else if(response['like_flag'] == -1) {
			$('.down_vote').addClass('text-danger');
		}

		if(response['star_flag'] == 1) {
			$('.favourite').addClass('text-warning');
		}

	}, 'json');

	$('#text_editor').summernote({
			height: 250                 // set editor height
	});

	$(".answer_submit").click(function(e) {

		var result = check_length($('#text_editor'), 30, "Answer must be atleast 30 characters");

		if(result) {
			e.preventDefault();
			$.post('../actions/insert/insert_answer.php', {'ques_id': ques_id, 'answer': $('#text_editor').val()}, function(response) {
				if(response) {
					$('#ans_count').text(parseInt($('#ans_count').text())+1);
					$('.ans_success').show().fadeOut(1600);
					$('.answer_container').append('<hr/><div class="row">'
							+'<div class="col-md-1 text-center">'
								// +'<i class="fa fa-thumbs-up fa-2x up_vote" aria-hidden="true"></i>'
								// +'<p class="help-block likes_count"> 0 </p>'
								// +'<i class="fa fa-thumbs-down fa-2x down_vote" aria-hidden="true"></i> <br/>  </br>'
								+'</br> <i class="fa fa-check fa-2x correct" aria-hidden="true"></i>'
							+'</div>'
							+'<div class="col-md-10">'
								+'<p>'+$('#text_editor').val()+'</p>'
								+'<p><span>'
									+'<a href="#"> <i style="color:black;" class="fa fa-user" aria-hidden="true"></i>'+name+'</a>'
								+'</span><span class="pull-right">'
									+'<i class="fa fa-calendar" aria-hidden="true"></i> '
									+ get_current_date()
									+'</span>'
								+'</p>'
							+'</div>'
					+'</div>');
					$('#text_editor').summernote('code', '');
				}
			});
		}
	});

	$('.fa-thumbs-up').click(function() {
		var _this = this;
		if(user_id == undefined) {
			$('.message').html('Please login to perform this !').show().fadeOut(2000);
		}
		else {
			$.post('../actions/update/update_likes_count.php', {'ques_id': ques_id, 'user_id': user_id, 'like_flag': 1}, function(response) {
								
				if(response >1) {
					$('.message').html('You have already liked this post').show().fadeOut(2000);
				}
				else if(response < -1) {
					$('.message').html('You have already unliked this post').show().fadeOut(2000);
				}
				else if(response == 1) {
					update_likes_counter(_this, 1);
					$(_this).addClass('text-success');
					$(_this).siblings('.down_vote').removeClass('text-danger');
				}
				else {
					update_likes_counter(_this, 1);
					$(_this).removeClass('text-success');
					$(_this).siblings('.down_vote').removeClass('text-danger');
				}
			});
		}
	});

	$('.fa-thumbs-down').click(function() {
		var _this = this;
		if(user_id == undefined) {
			$('.message').html('Please login to perform this !').show().fadeOut(2000);
		}
		else {
			$.post('../actions/update/update_likes_count.php', {'ques_id': ques_id, 'user_id': user_id, 'like_flag': -1}, function(response) {
				
				if(response >1) {
					$('.message').html('You have already liked this post').show().fadeOut(2000);
				}
				else if(response < -1) {
					$('.message').html('You have already unliked this post').show().fadeOut(2000);
				}
				else if(response == -1){
					update_likes_counter(_this, -1);
					$(_this).siblings('.up_vote').removeClass('text-success');
					$(_this).addClass('text-danger');
				}
				else {
					update_likes_counter(_this, -1);
					$(_this).siblings('.up_vote').removeClass('text-success');
					$(_this).removeClass('text-danger');
				}
			});
		}
	});

	$('.favourite').click(function() {
		var _this = this;
		if(user_id == undefined) {
			$('.message').html('Please login to perform this !').show().fadeOut(2000);
		}
		else {
			$.post('../actions/update/update_star.php', {'ques_id': ques_id}, function(response){
				if(response) {
					$( _this ).toggleClass( "text-warning" );
				}
			});
		}
	});

	$('.correct').click(function() {
		var _this = this;
		var hasClass = $(this).hasClass('text-success');
		var ans_id = $(this).siblings('.hidden_id').val();
		if(user_id != undefined)  {
			$.post('../actions/update/update_correct_ans.php', {'ques_id': ques_id, 'ans_id': ans_id}, function(response) {
				if(response){
					$('.correct').removeClass('text-success');
					if(!hasClass) {
						$(_this).addClass('text-success');
					}
				}			
			});
		}
	});


	$('.edit').click(function() {
		edit_content(this);
	});
	
	$('.done').click(function() {
		done_content(this);
	});
	
});
