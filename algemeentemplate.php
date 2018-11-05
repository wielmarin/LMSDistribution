<?php /* Template Name: algemeen template
* Template Post Type: post, page
*/ ?>

<?php get_header(); 

?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url(); ?>);">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			<?php the_title(); ?>
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="container-standaardtemp">
<div id="introductie-standaardtemp">
	<!-- THE LOOP --><?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
		<?php the_content(); ?>
	<?php
		endwhile; else: ?>
	<p></p>
	<?php endif; ?> <!-- END LOOP -->
</div>
</div>

<?php get_footer(); ?>