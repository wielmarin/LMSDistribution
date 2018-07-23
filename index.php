<?php get_header(); ?>

<!--- Blogs page ---->

<!----------------- THE CONTENT --------------->
<div id="excerptcontainer">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	
	<div id="excerptblock">
		<div id="thumbnail">
		<?php 
			if (has_post_thumbnail() ) {
			the_post_thumbnail('excerpt-thumb'); }
		?>
		</div>
		<div id="posttitle">
		<h2>
		<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
		</a>
		</h2>
		
		<p class="postinfo"><?php the_time('d/m/y'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php the_author();?></a> </p>
		
		</div>
		<div id="excerpts"><p>
		<?php echo get_the_excerpt(''); ?>
		<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
		</p></div>
	</div>
	
	<?php
	endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div>

<div id="mainimage">
		<?php	
			if ( has_post_thumbnail() ) {
			the_post_thumbnail('thumbnail');
			} 
		?>
</div>

<?php get_footer(); ?>