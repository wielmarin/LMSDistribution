<?php



function LMS_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), 1.0, true);
	wp_enqueue_script( 'ajax-script',get_template_directory_uri() . '/js/ajax-script.js', array('jquery') );
	wp_enqueue_script( 'backstretch',get_template_directory_uri() . '/js/backstretch.js', array('jquery') );


}

add_action('wp_enqueue_scripts', 'LMS_resources');


// Navigation Menus
register_nav_menus(array(
'primary' => __( 'Primary Menu'),
'secondary' => __( 'Secondary Menu'),
'portal' => __( 'Portal Menu' ),
));

// Featured images

add_theme_support( 'post-thumbnails' );

add_image_size( 'excerpt-thumb', 400, 400, true );
add_image_size( 'portalbox-image', 277, 205, true );
add_image_size( 'nieuws-banner', 625, 330, true );
add_image_size( 'full-banner', 1800, 800, true );


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
	return 18;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Remove ... after excerpt
function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/// Allow exe file uploads
function enable_extended_upload ( $mime_types =array() ) {

   // The MIME types listed here will be allowed in the media library.
   // You can add as many MIME types as you want.
   $mime_types['exe']  = 'application/vnd.microsoft.portable-executable'; 
   $mimetypes['eps'] = 'application/postscript';
   $mimetypes['ttf'] = 'application/octet-stream';  // Doesn't work yet??
   
   return $mime_types;
} 

add_filter('upload_mimes', 'enable_extended_upload');



// Add Portal Posts in Menu
function custom_post_init() {
    $args = array(
	  'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
      'public' => true,
      'label'  => 'Portal Items',
	  'taxonomies' => array( 'category' ),
	  'hierarchical' => true,
	  'exclude_from_search' => true
    );
    register_post_type( 'portal', $args );
	  $caseargs = array(
	  'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
      'public' => true,
      'label'  => 'Case Studies',
	  'taxonomies' => array( 'category' ),
	  'hierarchical' => true,
    );
    register_post_type( 'case', $caseargs );
}
add_action( 'init', 'custom_post_init' );



/// ACF Options page
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();
};


// Allow draft/private pages as Hoofd in hierarchy

add_filter('page_attributes_dropdown_pages_args', 'my_attributes_dropdown_pages_args', 1, 1);

function my_attributes_dropdown_pages_args($dropdown_args) {
    $dropdown_args['post_status'] = array('publish','draft','private');
    return $dropdown_args;
}




?>