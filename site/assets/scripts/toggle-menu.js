$(document).ready(function() {
	var original_height = $('div.expand-item').css('height');
	$('.expand-item .menu-label').click(function() {

		var expand_item = $(this).parent('div.expand-item');

		var height1 = expand_item.height();
	    expand_item.css('height', 'auto');
	    var height2 = expand_item.height();
	    expand_item.height(height1);

	    if (height1 < height2) {
		    expand_item.animate({height: height2}, 500);
		} else {
			expand_item.animate({height: original_height}, 500);
		}
	});
});

