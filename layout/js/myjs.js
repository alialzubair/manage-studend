/*global $, alert, console */
console.log('text');

$(function() {
	'use strict';
	$('.first_name').blur(function() {
		if ($(this).val().length <= 3) {
			$(this).css('border', '1px solid #f00');
			$(this).parent().find('.alert-danger').fadeIn(200);
		} else {
			$(this).css('border', '1px solid #880');
			$(this).parent().find('.alert-danger').fadeOut(200);
		}
	});
});
