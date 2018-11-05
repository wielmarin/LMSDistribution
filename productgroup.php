<?php /* Template Name: Product Group
* Template Post Type: post, page
*/ ?>

<?php get_header(); ?>


<div id="productgroup-container">
	<span id="individual-breadcrumb">
		<?php
			breadcrumb_trail();
		?>
	</span>

<?php

	$my_query = new WP_Query( array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $post->ID,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	));
	
	while ( $my_query->have_posts() ) : $my_query->the_post(); 
?>
<?php $merkpage = get_field('merk'); ?>
<?php $grandparentPage = wp_get_post_parent_id($post->post_parent); ?>
	<div id="frontproducts-1" class="frontproduct frontproduct-<?php echo get_row_index(); ?>" style="border: 1px solid rgba(0, 0, 0, 0.125);">
			<div id="frontproducts-1-img" class="frontproduct-img" <?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php the_post_thumbnail_url(); ?>)" 
				<?php } else { ?>
					style="background-image: url(<?php the_field('logo_merk', $merkpage); ?>); background-size: cover;"
				<?php } ?>>
			</div>
			<div id="frontproducts-1-text" class="frontproduct-text center" style="border-top: 0.7rem solid <?php the_field('merk_kleur', $merkpage); ?>; background: none;">
				<h3 id="frontproducts-1-text-title" class="frontproduct-text-title frontproduct-text-title-<?php echo get_row_index(); ?>">
					<?php the_title(); ?>
				</h3>
				<a id="frontproducts-1-text-link" class="frontproduct-text-link frontproduct-text-link-<?php echo get_row_index(); ?>" href="<?php the_permalink(); ?>">
				<?php $totalchildren = get_pages( array( 'child_of' => $post->ID, 'post_type' => 'page'));
				$count = count($totalchildren);
				if ($count < 2) { ?>
					Bekijk product <i class="fas fa-angle-right"></i>
				<? } else { ?>
					Bekijk categorie <i class="fas fa-angle-right"></i>
				<?php } ?>
				</a>
			</div>
	</div>
	
<?php endwhile; ?>	
	
</div>

<?php get_footer(); ?>