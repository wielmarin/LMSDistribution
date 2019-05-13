<?php get_header(); ?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url('full-banner'); ?>); <?php if(get_field('background_positie')) : ?> background-position: <?php the_field('background_positie'); endif;?> ">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			Merken
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="frontproducts" class="itemcont">
<!-------- Loop ------------>
<?php
	$args = array(
		'cat' => 4,
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'nopaging' => true,
		'post_type' =>'page',
	);
	
 $query = new WP_Query($args); ?>
	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	   <div id="frontproducts-1" class="frontproduct" style="">
			<div id="frontproducts-1-img" class="frontproduct-img" <?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php echo get_field('logo_merk'); ?>)" 
				<?php } else { ?>
					style="background-image: url(/wp-content/uploads/2018/08/SmallLogo.jpg); background-size: contain;"
				<?php } ?>>
			</div>
			<div id="frontproducts-1-text" class="frontproduct-text center" style="border-color: <?php the_field('merk_kleur'); ?>;">
				<h3 id="frontproducts-1-text-title" class="frontproduct-text-title">
					<?php the_title(); ?>
				</h3>
				<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="<?php the_permalink(); ?>">
					Bekijk producten <i class="fas fa-angle-right"></i>
				</a>
			</div>
		</div>

	<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>


</div>

<div id="advies-background">
	<div id="advies">
		<div id="advies-tekst">
			<h2 class="advies-titel">Advies en demo ontvangen?
			<div id="advies-border"></div>
			</h2>
			<p>Laat uw gegevens achter en wij nemen zo spoedig mogelijk contact met u op. U kunt ons ook telefonisch bereiken via <a href="tel:085-0703058">085-0703058</a>.</p>
		</div>

		<div id="advies-contact">
			<?php echo do_shortcode('[contact-form-7 id="104" title="Contactformulier 1"]'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>