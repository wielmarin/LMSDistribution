jQuery( document ).ready(function() {
// After here

// Show Search Box with Animation
jQuery('.fa-search').click(function() {
	jQuery('.fa-search').toggleClass('spin');
	jQuery('#searchform').toggle('drop', {'direction': 'right'}, 400);
});

// Show side contact
jQuery('#contactbutton').click(function() {
	jQuery('#contactx').toggle(200);
	jQuery('#contactbutton').toggleClass('contact-full', 500);
//	jQuery('#contactbutton').toggleClass('contact-small', 400);
});


//  Animate front box reaction
jQuery('.frontproduct').hover(function() {
	jQuery(this).toggleClass('raisebox', 100);
});

//Function to animate Portal side menu
	function sideMenu() {
		jQuery('#portal-content-side-list ul li').removeClass('portalcontentactive');
		jQuery(this).addClass('portalcontentactive');
		jQuery(this).children('ul').slideDown();
		return false;
	}


// Portal Menu - deactive links, change bullets, open submenu
jQuery('#portal-content-side-list li').click(function() {
	jQuery('#portal-content-side-list ul li').removeClass('portalcontentactive');
	jQuery(this).addClass('portalcontentactive');
	jQuery(this).parents('li').addClass('portalcontentactive');
	jQuery(this).children('ul').toggle();
	return false;
});

// Deactive links tile menu
jQuery('#portal-content-right-space').click(function() {
	return false;
});

// Change side menu when click on tile menu
jQuery('#portal-content-right-space').on("click", "a", function() {
	var sharedLink = jQuery(this).attr('href');
	var matchedLink = jQuery("a[href='" + sharedLink + "'");
	var matchedItem = matchedLink[0].parentElement;
	jQuery(matchedItem).addClass('portalcontentactive');
	jQuery(matchedItem).children('ul').slideDown();
	return false;
});


// Load External File in new window
jQuery('#portal-content-right-space').on("click", ".externalfile", function(event) {
	var fileurl = jQuery(this).attr('url');
	console.log(fileurl);
	window.open(fileurl);
	return false;
});

// Action Portal breadcrumb
jQuery('.breadcrumbportal').click(function() {
	location.reload();
});



//////// Slideshow homepage header with Backstretch

jQuery("#hero").backstretch([
	"/wp-content/uploads/2018/08/Banner-image.jpg",
	"/wp-content/uploads/2018/08/hero-snap.jpg",
	"/wp-content/uploads/2018/08/man_lidner_huddle_-1.jpg",
	],
	{transitionDuration: 800},
	);




//END
});