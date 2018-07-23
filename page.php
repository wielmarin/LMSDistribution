<?php get_header(); ?>

<!--- BASIC PAGES, INCLUDING HOME ---->



<!----------------- THE CONTENT --------------->
<div id="maintext">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	the_content();
	endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div>

<div id="mainimage">
		<?php	
			if ( has_post_thumbnail() ) {
			the_post_thumbnail('medium');
			} 
		?>
</div>
<?php get_footer(); ?>