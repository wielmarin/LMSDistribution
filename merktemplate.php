<?php /* Template Name: Merk Page
* Template Post Type: post, page
*/ ?>

<?php get_header(); 

$logo = "/lms/wp-content/uploads/2018/08/portal-video-poster-1-e1535286490910.jpg";
?>

<div id="hero-sub">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			Producten I3-technologies
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="pitch" class="itemcont center">

	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		<img src="/lms/wp-content/uploads/2018/09/Logo-i3technologies.png" alt="I3 Technologies" width="350px" height="100%">
		</h2>
	</div>
	<div id="pitch-text" class="center">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
	
</div>

<div id="productgroup-container">
	<!--- 
	
	<span id="individual-breadcrumb">
		<?php
			breadcrumb_trail();
		?>
	</span>
	
	-->

<?php

	$my_query = new WP_Query( array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $post->ID,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	));
	
	if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); 
?>



	<div id="frontproducts-1" class="frontproduct">
			<div id="frontproducts-1-img" class="frontproduct-img" <?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php the_post_thumbnail_url(); ?>)" 
				<?php } else { ?>
					style="background-image: url(<?php echo $logo ?>); background-size: contain;"
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
	
<?php endwhile;
else: ?>
	<p id="merk-coming"><?php the_title(); ?> products coming soon!</p>
<?php endif; ?>	
	
</div>

<?php if (is_page('i3-technologies')) : ?>
<script>
    jQuery('.frontproduct-text').css('border-top','0.7rem solid #ffa300');
	jQuery('.frontproduct-text').css('background','none');
	jQuery('.frontproduct').css('border','1px solid rgba(0, 0, 0, 0.125)');
	jQuery('#merklogo').attr('src', '/lms/wp-content/uploads/2018/08/portal-video-poster-1-e1535286490910.jpg');
	jQuery('#border-subpage').css('border-bottom','2px solid #ffa300')
	
</script>

<?php elseif (is_page('turning-technologies')) : ?>
<script>
    jQuery('.frontproduct-text').css('border-top','0.7rem solid #ffa300');
	jQuery('.frontproduct-text').css('background','none');
	jQuery('.frontproduct').css('border','1px solid rgba(0, 0, 0, 0.125)');
	jQuery('#merklogo').attr('src', '/lms/wp-content/uploads/2018/08/portal-video-poster-1-e1535286490910.jpg');
	jQuery('#border-subpage').css('border-bottom','2px solid blue')
	
</script>
<?php
endif; ?>

<?php get_footer(); ?>