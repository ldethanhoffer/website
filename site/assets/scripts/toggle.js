// Make text expandable: 
$(document).ready(function() {
	var original_height = $('p.expand-text').css('height');
	$('.expand-text').click(function() {
		var height1 = $(this).height();
	    	$(this).css('height', 'auto');
	    var height2 = $(this).height();
	    	$(this).height(height1);
	    if (height1 < height2) {
		    $(this).animate({height: height2}, 500);
		} else {
			$(this).animate({height: original_height}, 500);
		}
	});
});