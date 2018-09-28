jQuery( document ).ready(function() {

// Portal menu load page in space
jQuery('#portal-content-side-list a').click(function() {
	var clickedLink = jQuery(this).attr('href');
	jQuery('#portal-content-right-space').load(clickedLink);
});


// Tile menu load page in space
jQuery('#portal-content-right-space').on("click touchstart","a", function() {
	var clickedTile = jQuery(this).attr('href');
	jQuery('#portal-content-right-space').load(clickedTile);
});





});