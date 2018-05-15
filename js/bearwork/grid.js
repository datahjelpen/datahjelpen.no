$(document).ready(function($) {
	$('.grid').children('.row').each(function(index, el) {
		var elRow = $(el);
		var elImage = elRow.find('.bg-image');
		setTimeout(function() {
			elImage.height(elRow.outerHeight());
		}, 1);
	});
});