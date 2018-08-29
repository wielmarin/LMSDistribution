<?php /* Template Name: nieuws template
* Template Post Type: post, page
*/ ?>

<?php

get_header();
 ?>

<div id="container-nieuwsbericht">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
	
	<div id="container-nieuwsbericht-left">
		<h1><?php the_title(); ?></h1>
		<span><?php the_time('j/m/Y'); ?></span>
		<img src="<?php the_post_thumbnail_url('nieuws-banner'); ?>" alt="whiteboard" width="100%" height="300px">
		<?php the_content(); ?>
	</div>
	
<?php
	endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
	
	
	
	
	<div id="container-nieuwsbericht-right">
	
<?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
	  'post__not_in' => array( get_the_ID() ),
   )); 
?>

<div id="container-nieuwsbericht-right-titel">
	<h2>Laatste nieuws</h2>
</div>
		
<?php if ( $the_query->have_posts() ) : ?>
 <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<div id="nieuws-sidebar">
			<div id="excerptimage-sidebar" style="background-image:url(<?php the_post_thumbnail_url(thumbnail); ?>)">
			</div> 
			<div id="flex1" class="excerpttext">
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
			
				<a href="<?php the_permalink(); ?>" class="readmorelink">Lees artikel</a>
			</div>
		</div>
		<div id="nieuws-border"></div>
		


  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php __('No News'); ?></p>
<?php endif; ?>
	

	
			
			 
			
		
	</div>	
	

	
</div>



<?php

get_footer();

?>