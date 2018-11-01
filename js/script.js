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

// Functie overzicht - align laatste item links, in line met andere
function funcOverAlign() {
	var foML = jQuery('#functieoverzicht-item:first-of-type').css('margin-left');
	var LastML = '20px auto 20px ' + foML;
	jQuery('#functieoverzicht-item:last-of-type').css('margin', LastML);
};
funcOverAlign();  /// RUN

//// ATTEMPTED FIX WINDOWS HOVER MENU - MAYBE NEEDS TO BE ON LINK?
jQuery('.menu-item-has-children').attr('aria-haspopup','true');

// Mobile Menu
jQuery('#mobile-menu-open').click(function() {
	jQuery('.site-nav').toggle();
	jQuery('#mobile-show').toggle();
	jQuery('#mobile-hide').toggle();
	jQuery('.fa-bars').toggle();
	jQuery('.fa-times').toggle();
});



	// Maintain image width:height ratio for frontproduct block on merk page
		// Get box width
		var merkBoxWidth = jQuery('#productgroup-container .frontproduct').width();
		// Get ratio for height
		var merkBoxHeight = merkBoxWidth * 0.73 + 'px';
		// Apply height to the img
		jQuery('#productgroup-container .frontproduct-img').css('height', merkBoxHeight);
		
		
	// Nav Menu Up arrow
	function navUpArrow() {
		var homeWidth = jQuery('#menu-item-137').outerWidth(true);
		var productWidth = jQuery('#menu-item-141').outerWidth(true);
		var productHalf = productWidth / 2;
		var arrowPosition = homeWidth + productHalf + 15 + 'px';
		jQuery('.nav-arrow').css('margin-left', arrowPosition);	
	};
	navUpArrow();  /// RUN

		
////// MEDIA COMMAND		
function checkPosition() {
    if (window.matchMedia('(max-width: 1020px)').matches) { ////////SMALLER SCREEN
		//Submenus
		jQuery(".site-nav a").filter(function(){
			return ( jQuery(this).siblings('ul').length > 0 );
		}).on("click", function(e) {
			e.preventDefault();
			// hide sibling ul element (if it exists)
			jQuery(this).siblings("ul").toggle();
		});

		// Append Arrows
		jQuery('.menu-item-has-children').append('<i class="fas fa-angle-down fa-change"></i><i class="fas fa-angle-up fa-change"></i>');
		
		// Give space
		jQuery('.fa-change').css('margin-left', '10px');
		//Hide close arrow
		jQuery('.fa-angle-up').hide();
		
		// Change arrow on click
		jQuery('.site-nav a').click( function() {
			jQuery(this).find('.fa-change').toggle();
		});
		
		// Hide mobile menu on resize
		jQuery('.site-nav').hide();


	} else { ///////// LARGER SCREEN
		jQuery('.fa-change').hide();
		jQuery('.site-nav').show();
	
		
	} ///////////// END MEDIA COMMAND
	};
checkPosition(); // RUN
	
	
	
///////////////// RESIZE FUNCTION STARTS HERE!!
var resizeTimer;
jQuery(window).on('resize', function(e) {	
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function() {

		// Maintain image width:height ratio for frontproduct block on merk page
			// Get box width
			var merkBoxWidth = jQuery('#productgroup-container .frontproduct').width();
			// Get ratio for height
			var merkBoxHeight = merkBoxWidth * 0.72 + 'px';
			// console.log('Box Width =' + merkBoxWidth);
			// console.log('Box Height =' + merkBoxHeight);
			// Apply height to the img
			jQuery('#productgroup-container .frontproduct-img').css('height', merkBoxHeight);
  
  
	// RUN MEDIA COMMAND	
	checkPosition();	

	// Position Nav Up Arrow
	navUpArrow();	
	
	// Function Overzicht last item alignment
	funcOverAlign();
	
	// Hide open menu
	jQuery('.site-nav ul li ul').hide();

  }, 250); // Resize timeout time to prevent over-activation

});	// End resize function


	
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
	
	// Change layout when only 1 image
	if (jQuery('.product-image-block').length < 2) { 
		jQuery('#product-image-container').hide();  
	};
	
	// Change layout when only 2 images
	if (jQuery('.product-image-block').length === 2) { 
		jQuery('#product-image-container').css('justify-content','left'); 
		jQuery('.product-image-block').css('margin-right','20px') 
	};
	
	// Allow 5 per line
	if (jQuery('.product-image-block').length === 5) { 
		jQuery('.product-image-block').css('width','18%') 
	}
	

//// Waar te koop page
	// Alle Merken Button
	jQuery('.all-merken-button').click( function() {
		jQuery('.waar-item').show();
		jQuery('#waar-coming').hide();
	});
	
	// Other buttons
	jQuery('.merk-button').click( function() {
		// Turn data into variable
		var merkPage = jQuery(this).attr('data-merk-id');
		// Hide all blocks
		jQuery('.waar-item').hide();
		// Check if have items
		var itemCheck = jQuery('.waar-item-merk-' + merkPage).length;
		if (itemCheck > 0) {
			// Show blocks from clicked merk if available
			jQuery('.waar-item-merk-' + merkPage).show();
			jQuery('#waar-coming').hide();
		} else {
			// if no items, show text
			jQuery('#waar-coming').show();
		}
	});
	
	// Change button opacity on click
	jQuery('.filter-button').click( function() {
		// Change opacity all buttons to default
		jQuery('.filter-button').removeClass('active-button');
		// Add to clicked button
		jQuery(this).addClass('active-button');
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