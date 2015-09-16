(function($){
	$('.navigation .menu li a.active').parent('li').addClass('active');


		//console.log(navThumbs);
	$.each(navThumbs, function(i, v) {
		image = '<img src="' + v + '">';
		$('.navigation .menu li a[href$="' + navAliases[i] + '"]').prepend(image);
	});
})(jQuery);