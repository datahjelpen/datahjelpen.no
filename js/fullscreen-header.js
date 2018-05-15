$(function() {
	// Keep the footer down by the bottom
	dynamicHeaderHeight();

	function dynamicHeaderHeight() {
		if ($(window).width() < 768) {
			$('#index-header').height($(window).height() / 1.5 - $('#look-at-work').outerHeight() - $('nav').outerHeight());
		};
	};

	// Execute code after user is done rezizing the window
	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	$(window).resize(function() {
		delay(function(){
			dynamicHeaderHeight();
		}, 100);
	});
});