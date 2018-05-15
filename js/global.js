	$('#menu-show, #menu-hide').click(function(e) {
		e.preventDefault();
		var menu = $('#main-menu');

		if (menu.hasClass('active')) {
			menu.removeClass('active');
			$('#menu-show').show();
			$('#menu-hide').hide();
		} else {
			menu.addClass('active');
			$('#menu-hide').show();
			$('#menu-show').hide();
		};
	});

	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top - 25
					}, 250);
					return false;
				}
			}
		});
	});
