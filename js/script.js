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

// Main menu products dropdown 
	
	// Deactivate Links
	jQuery('.menunolink > a').click(function() {
		return false;
	});
	
	// Append arrow
	jQuery('.menunolink > a').append(' <i class="fas fa-caret-right"></i>');
	
	// Show up arrow
	jQuery('#menu-item-141').hover(function() {
		jQuery('.nav-arrow').toggle();
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
	"/lms/wp-content/uploads/2018/08/Banner-image.jpg",
	"/lms/wp-content/uploads/2018/08/hero-snap.jpg",
	"/lms/wp-content/uploads/2018/08/man_lidner_huddle_-1.jpg",
	],
	{transitionDuration: 800},
	);
	

	
///////// Individual product page

jQuery('.individualdownload').hide();

jQuery('#individual-downloads-manuals-button').click( function() {
	jQuery('.manualfile').toggle();	
});

jQuery('#individual-downloads-technical-button').click( function() {
	jQuery('.techfile').toggle();	
});


jQuery('#individual-downloads-drivers-button').click( function() {
	jQuery('.driverfile').toggle();	
});

	////// Change image on click
	jQuery('.product-image-block').click(function() {
		var image = jQuery(this).css('background-image');
		console.log(image);
		jQuery('#individual-left').css('background-image', image);
		
	});

////// Text Membership Plugin aanpassen

jQuery('.swpm_mini_login_login_here a').html('Inloggen - ');

jQuery('.swpm_mini_login_no_membership').html('Nog steeds geen lid? ');

jQuery('.swpm_mini_login_join_now a').html('Schrijf je nu in');

jQuery('.swpm_mini_login_label').html('Ingelogd als: ');

//END
});