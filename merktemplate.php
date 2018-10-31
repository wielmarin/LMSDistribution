<?php /* Template Name: Merk Page
* Template Post Type: post, page
*/ ?>

<?php get_header(); 

$logo = "<?php the_field('logo_merk'); ?>";
?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url(); ?>);">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			Producten <?php the_title(); ?>
		</h1>
		<div id="border-subpage" style="border-bottom: 2px solid <?php the_field('merk_kleur'); ?>"></div>
	</div>
</div>

<div id="pitch" class="itemcont center">

	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		<img src="<?php the_field('logo_merk'); ?>" alt="I3 Technologies" width="320px" height="100%">
		</h2>
	</div>
	<div id="pitch-text" class="center">
		<!-- THE LOOP --><?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
		<?php the_content(); ?>
	<?php
	endwhile; else: ?>
	<p></p>
	<?php endif; ?> <!-- END LOOP -->
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



	<div id="frontproducts-1" class="frontproduct" style="border: 1px solid rgba(0, 0, 0, 0.125);">
			<div id="frontproducts-1-img" class="frontproduct-img" <?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php the_post_thumbnail_url(); ?>)" 
				<?php } else { ?>
					style="background-image: url(<?php the_field('logo_merk', $post->post_parent); ?>); background-size: 90%;"
				<?php } ?>>
			</div>
			<div id="frontproducts-1-text" class="frontproduct-text center" style="border-top: 0.7rem solid <?php the_field('merk_kleur', $post->post_parent); ?>; background: none;">
				<h3 id="frontproducts-1-text-title" class="frontproduct-text-title">
					<?php the_title(); ?>
				</h3>
				<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="<?php the_permalink(); ?>">
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

	
<?php endwhile;
else: ?>
	<p id="merk-coming">De producten van <?php the_title(); ?> gaan binnenkort live</p>

<?php endif; ?>	
	
</div>

<div id="advies-background">
	<div id="advies">
		<div id="advies-tekst">
			<h2 class="advies-titel">Alvast een demo ontvangen?
			<div id="advies-border"></div>
			</h2>
			<p>Laat uw gegevens achter en wij nemen zo spoedig mogelijk contact met u op. U kunt ons ook telefonisch bereiken via <a href="tel:085-0703058">085-0703058</a>.</p>
		</div>

		<div id="advies-contact">
			<?php echo do_shortcode('[contact-form-7 id="104" title="Contactformulier 1"]'); ?>
		</div>
	</div>
</div>

<?php if (is_page('i3-technologies')) : ?>
<script>
    jQuery('.frontproduct-text').css('border-top','0.7rem solid #ffa300');
	jQuery('.frontproduct-text').css('background','none');
	jQuery('.frontproduct').css('border','1px solid rgba(0, 0, 0, 0.125)');
	jQuery('#merklogo').attr('src', '/wp-content/uploads/2018/08/portal-video-poster-1-e1535286490910.jpg');
	//jQuery('#border-subpage').css('border-bottom','2px solid #ffa300')
	
</script>

<?php elseif (is_page('turning-technologies')) : ?>
<script>
    jQuery('.frontproduct-text').css('border-top','0.7rem solid #FFEF52');
	jQuery('.frontproduct-text').css('background','none');
	jQuery('.frontproduct').css('border','1px solid rgba(0, 0, 0, 0.125)');
	jQuery('#merklogo').attr('src', '/wp-content/uploads/2018/09/TurningTechlogo.png');
	//jQuery('#border-subpage').css('border-bottom','2px solid #FFEF52')
	
</script>

<?php elseif (is_page('smart-metals')) : ?>
<script>
    jQuery('.frontproduct-text').css('border-top','0.7rem solid #003F79');
	jQuery('.frontproduct-text').css('background','none');
	jQuery('.frontproduct').css('border','1px solid rgba(0, 0, 0, 0.125)');
	jQuery('#merklogo').attr('src', '/wp-content/uploads/2018/09/TurningTechlogo.png');
	//jQuery('#border-subpage').css('border-bottom','2px solid #003F79')
	
</script>

<?php elseif (is_page('leftclick')) : ?>
<script>
    jQuery('.frontproduct-text').css('border-top','0.7rem solid #86AA42');
	jQuery('.frontproduct-text').css('background','none');
	jQuery('.frontproduct').css('border','1px solid rgba(0, 0, 0, 0.125)');
	jQuery('#merklogo').attr('src', '/wp-content/uploads/2018/09/TurningTechlogo.png');
	//jQuery('#border-subpage').css('border-bottom','2px solid #86AA42')
	
</script>


<?php
endif; ?>

<?php get_footer(); ?>