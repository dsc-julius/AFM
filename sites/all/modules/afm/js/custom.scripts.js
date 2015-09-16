jQuery(document).ready(function($) {
	$('a[href*="node/13/edit"], a[href*="node/21/edit"]').closest('ul').find('li.delete').remove();
	$('a[href*="node/add/auctions"], a[href*="node/add/homepage-settings"]').each(function() {
		$(this).closest('li').remove();
	});

	$('ul#toolbar-menu').append('<li class=""><a href="/afm/dev/node/21/edit" id="" title="Homepage Settings"><span class="icon"></span>Homepage Settings <span class="element-invisible">(Homepage Settings)</span></a></li>');
	$('ul#toolbar-menu').append('<li class=""><a href="/afm/dev/node/13/edit" id="" title="Auctions"><span class="icon"></span>Auctions <span class="element-invisible">(Auctions)</span></a></li>');
});