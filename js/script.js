jQuery( document ).ready(function() {
// After here

// Show Search Box with Animation
jQuery('.fa-search').click(function() {
	jQuery('.fa-search').toggleClass('spin');
	jQuery('#searchform').toggle('drop', {'direction': 'right'}, 400);
});

// Show side contact
jQuery('#contactbutton').click(function() {
	jQuery('#contactx').toggle(100);
	jQuery('#contactbutton').toggleClass('contact-full', 500);
//	jQuery('#contactbutton').toggleClass('contact-small', 400);
});


//  Animate front box reaction
jQuery('.frontproduct').hover(function() {
	jQuery(this).toggleClass('raisebox', 100);
});


// Portal Menu
jQuery('#portal-content-side-list li').click(function() {
	jQuery('#portal-content-side-list ul li').removeClass('portalcontentactive');
	jQuery(this).addClass('portalcontentactive');
	jQuery(this).children('ul').slideToggle();
	return false;
});


	



//END
});