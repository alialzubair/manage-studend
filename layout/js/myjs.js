$(function() {
	'use strict';

	// Hide placehorder on form focuse

	$('[placeholder]')
		.focus(function() {
			$(this).attr('data-text', $(this).attr('placeholder'));
			$(this).attr('placeholder', '');
		})
		.blur(function() {
			$(this).attr('placeholder', $(this).attr('data-text'));
		});

	// add asterisk on required field
	// $('input').each(function() {
	// 	if ($(this).attr('required') === 'required') {
	// 		$(this).after('<span class="asterisk">*</span>');
	// 	}
	// });
	//convert password field to text filed on hover
	var passfiled = $('.password');
	$('.show-pass').hover(
		function() {
			passfiled.attr('type', 'text');
		},
		function() {
			passfiled.attr('type', 'password');
		}
	);

	//congiremation message on button
	$('.confirm').click(function() {
		return confirm('are you sure wind delete this?');
	});
});

$('.name').blur(function() {
	if ($(this).val().length <= 3) {
		//
		console.log('ali');
	} else {
		$(this).css('border', '1px solid #880');
		$(this).parent().find('.alert-danger').fadeOut(200);
	}
});
