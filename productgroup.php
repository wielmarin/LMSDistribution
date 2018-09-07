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

	<div id="frontproducts-1" class="frontproduct">
			<div id="frontproducts-1-img" class="frontproduct-img" <?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php the_post_thumbnail_url(); ?>)" 
				<?php } else { ?>
					style="background-image: url(/lms/wp-content/uploads/2018/08/SmallLogo.jpg); background-size: contain;"
				<?php } ?>>
			</div>
			<div id="frontproducts-1-text" class="frontproduct-text center">
				<h3 id="frontproducts-1-text-title" class="frontproduct-text-title">
					<?php the_title(); ?>
				</h3>
				<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="<?php the_permalink(); ?>">
					Take a look <i class="fas fa-angle-right"></i>
				</a>
			</div>
		</div>
	
<?php endwhile; ?>	
	
</div>

<?php get_footer(); ?>