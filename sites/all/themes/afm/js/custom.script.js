(function($){
	$('.navigation .menu li a.active').parent('li').addClass('active');
	$('.navigation .menu li .menu li a.active').parent('li').parent('ul').parent('li').addClass('active');


	$.each(navThumbs, function(i, v) {
		image = '<img src="' + v + '">';
		$('.navigation .menu li a[href$="' + navAliases[i] + '"]').prepend(image);
	});
})(jQuery);