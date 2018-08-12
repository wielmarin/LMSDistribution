<?php

/* Template Name: Portal Tile Menu
Template Post Type: page
*/

?>

<div id="breadcrumbtrail">
<?php
breadcrumb_trail();
?>
</div>

<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>
	
		<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
		
		<a id="parent-<?php the_ID(); ?>" class="portalbox" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					<p class="portalbox-title"><?php the_title(); ?></p>

		</a>
		
		<?php endwhile;	?>
	
<?php endif; wp_reset_postdata(); ?>
