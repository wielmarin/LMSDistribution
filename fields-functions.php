<?php 

add_action( 'cmb2_init', 'lms_distribution_register_about_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function lms_distribution_register_about_page_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_lms_distribution_';
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Bestanden', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'key' => 'page-template', 'value' => 'tilemenu.php' ),
	) );
	$cmb_about_page->add_field( array(
		'name' => __( 'Bestanden', 'cmb2' ),
		'desc' => __( 'Bestanden voor deze page hier', 'cmb2' ),
		'id'   => $prefix . 'files',
		'type' => 'file_list',
	) );
}

