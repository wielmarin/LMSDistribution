<?php get_header(); ?>

<div id="hero-sub">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			<?php the_title(); ?>
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<?php get_header(); ?>

<div id="advies-background">
	<div id="advies">
		<div id="advies-tekst">
			<h2 class="advies-titel"><?php the_title(); ?>
			<div id="advies-border"></div>
			</h2>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<p><?php the_content(); ?></p>	
			<?php
			endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		</div>

		<div id="advies-contact">
			<?php echo do_shortcode('[contact-form-7 id="104" title="Contactformulier 1"]'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
