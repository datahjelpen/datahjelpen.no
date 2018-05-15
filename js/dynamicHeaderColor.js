var colors = {
	'white':	'#ffffff',
	'grey':		'#f0f0f0',
	'black':	'#1b1b1b',
	'red':		'#ff1a36',
	'purple':	'#711aff',
	'navy':		'#1a36ff',
	'blue':		'#1aa8ff',
	'green':	'#1aff71',
	'yellow':	'#ffe41a',
	'orange':	'#ff711a',
	'primary':	'#ff711a',
	'accent':	'#1aa8ff'
}

var bodyClasses = $('body').attr('class').split(' ')

$.each(bodyClasses, function(index, val) {
	if (colors[val] != undefined) {
		$('meta[name="theme-color"]').attr({content: colors[val]});
		$('meta[name="msapplication-TileColor"]').attr({content: colors[val]});
		$('meta[name="msapplication-navbutton-color"]').attr({content: colors[val]});
	};
});