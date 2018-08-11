<?php



function LMS_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), 1.0, true);
	//wp_enqueue_script( 'ajax-script',get_template_directory_uri() . '/js/ajax-script.js', array('jquery') );
	
	

}

add_action('wp_enqueue_scripts', 'LMS_resources');


/* Try to add AJAX
function my_enqueue() {
      wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/ajax-script.js', array('jquery') );

 }
 add_action( 'wp_enqueue_scripts', 'my_enqueue' );
*/

 // Make custom variables
 
 


// Navigation Menus
register_nav_menus(array(
'primary' => __( 'Primary Menu'),
'secondary' => __( 'Secondary Menu'),
'portal' => __( 'Portal Menu' ),
));

// Featured images

add_theme_support( 'post-thumbnails' );

add_image_size( 'excerpt-thumb', 400, 400 );


// Categories and Tags for pages

function myplugin_settings() {  
    // Add tag metabox to page
    register_taxonomy_for_object_type('post_tag', 'page'); 
    // Add category metabox to page
    register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of your theme functions.php file 
add_action( 'init', 'myplugin_settings' );



// Excerpts
// Length
function custom_excerpt_length() {
	return 90;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Remove ... after excerpt
function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');




?>