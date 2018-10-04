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

// Mobile Menu
jQuery('#mobile-menu-open').click(function() {
	jQuery('.site-nav').toggle();
});
	
	
	//Submenus
	function checkPosition() {
    if (window.matchMedia('(max-width: 1020px)').matches) {
		jQuery(".site-nav a").filter(function(){
			return ( jQuery(this).siblings('ul').length > 0 );
		}).on("click", function(e) {
			e.preventDefault();
			// hide sibling ul element (if it exists)
			jQuery(this).siblings("ul").slideToggle(800);
			
		});
		
		
		// Append Arrows
		jQuery('.menu-item-has-children > a').append('<i class="fas fa-angle-down fa-change"></i><i class="fas fa-angle-up fa-change"></i>');
		
		// Give space
		jQuery('.fa-change').css('margin-left', '10px');
		//Hide close arrow
		jQuery('.fa-angle-up').hide();
		
		// Change arrow on click
		jQuery('.site-nav a').click( function() {
			jQuery(this).find('.fa-change').toggle();
		});

	//// End media command
	}
	};
	checkPosition();
	
// Nav Menu Up arrow
var resizeTimer;
jQuery(window).on('resize', function(e) {

  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {
	  
var homeWidth = jQuery('#menu-item-137').outerWidth(true);
console.log(homeWidth);
var productWidth = jQuery('#menu-item-141').outerWidth(true);
console.log(productWidth);
var productHalf = productWidth / 2;
console.log(productHalf);
var arrowPosition = homeWidth + productHalf - 10 + 'px';
console.log(arrowPosition);
jQuery('.nav-arrow').css('margin-left', arrowPosition);	

  }, 250);

});	
	
// Main menu products dropdown 
	// Dropdown Touch Function, do not edit
	;(function(e,t,n,r){e.fn.doubleTapToGo=function(r){if(!("ontouchstart"in t)&&!navigator.msMaxTouchPoints&&!navigator.userAgent.toLowerCase().match(/windows phone os 7/i))return false;this.each(function(){var t=false;e(this).on("click",function(n){var r=e(this);if(r[0]!=t[0]){n.preventDefault();t=r}});e(n).on("click touchstart MSPointerDown",function(n){var r=true,i=e(n.target).parents();for(var s=0;s<i.length;s++)if(i[s]==t[0])r=false;if(r)t=false})});return this}})(jQuery,window,document);
		// Applied to main menu
		jQuery( '.site-nav li:has(ul)' ).doubleTapToGo();


	
	// Deactivate Links
	jQuery('.menunolink > a').click(function() {
		return false;
	});
	
	// Append arrow
	jQuery('.site-nav ul li .menu-item-has-children').append(' <i class="fas fa-caret-right"></i>');
	
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
	window.open(fileurl);
	return false;
});

// When click on "Portal"in breadcrumb menu in poortal, reload entire page
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

jQuery('#individual-downloads-whitepapers-button').click( function() {
	jQuery('.whitepaperfile').toggle();	
});

	////// Change image on click
	jQuery('.product-image-block').click(function() {
		var image = jQuery(this).css('background-image');
		jQuery('#individual-left').css('background-image', image);
		
	});
	



////// Text Membership Plugin aanpassen

jQuery('.swpm_mini_login_login_here a').html('Inloggen - ');

jQuery('.swpm_mini_login_no_membership').html('Nog steeds geen lid? ');

jQuery('.swpm_mini_login_join_now a').html('Schrijf je nu in');

jQuery('.swpm_mini_login_label').html('Ingelogd als: ');

// Portal Menu - deactive links, change bullets, open submenu
jQuery('#portal-content-side-list li').click(function() {
	jQuery('#portal-content-side-list ul li').removeClass('portalcontentactive');
	jQuery(this).addClass('portalcontentactive');
	jQuery(this).parents('li').addClass('portalcontentactive');
	jQuery(this).children('ul').toggle();
	return false;
});

// Deactive links tile menu
jQuery('#portal-content-right-space').click(function(e) {
	return false;
});

// Deactive links tile menu mobile - CAREFUL WITH THIS!
jQuery('#portal-content-right-space').on('touchstart', function(z) {
	return false;
});

//END
});