<?php get_header(); ?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url('full-banner'); ?>); <?php if(get_field('background_positie')) : ?> background-position: <?php the_field('background_positie'); endif;?> ">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			Over LMS Distribution
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="pitch" class="itemcont center">

	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		Welkom bij LMS Distribution
		</h2>
		<div class="underline"></div>
	</div>
	<div id="pitch-text" class="center">
		<!-- THE LOOP -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>
				<?php the_content(); ?>
			<?php
			endwhile; else: ?>
			<p></p>
			<?php endif; ?> 
		<!-- END LOOP -->
		<a id="hero-text-link" href='#' class="btn2">
			Gesprek aanvragen >
		</a>
	</div>
	
</div>

<div id="over-container">
	<div id="over">
		
		<div id="over-tekst">
			<?php the_field('tekst_over_ons'); ?>
		</div>
		<div id="over-foto">
			<img src="/wp-content/uploads/2018/08/Over-LMS-Distribution.jpg" alt="whiteboard" width="450px" height="true">
		</div>
	</div>
</div>
<div id="advies-background">
	<div id="advies">
		<div id="advies-tekst">
			<h2 class="advies-titel">Graag even kennismaken?
			<div id="advies-border"></div>
			</h2>
			<p>Laat uw gegevens achter en wij nemen zo snel mogelijk contact met u op. U kunt ons ook telefonisch bereiken via <a href="tel:085-0703058">085-0703058</a>.</p>
		</div>

		<div id="advies-contact">
			<?php echo do_shortcode('[contact-form-7 id="104" title="Contactformulier 1"]'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>