<?php get_header(); ?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url('full-banner'); ?>); <?php if(get_field('background_positie')) : ?> background-position: <?php the_field('background_positie'); endif;?> ">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			<?php the_title(); ?>
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="pitch" class="waar-pitch itemcont center">

	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		Dealer LMS Distribution
		</h2>
		<div class="underline"></div>
	</div>
	<div id="pitch-text" class="center">
		<p>De producten van LMS Distribution zijn te koop via een breed netwerk van dealers. Hieronder vindt u een compleet overzicht van de verkooppunten van onze producten.</p>
	</div>
	
</div>

<div id="waar-filter">
	<div id="mobile-filter">
		<h4>Filter <i class="fas fa-caret-down"></i></i></h4>
	</div>
	<div class="filter-button all-merken-button">
		<h4>Alle Merken</h4>
	</div>
	<?php
	$args = array(
		'cat' => 4,
		'order' => 'ASC',
		'nopaging' => true,
		'post_type' =>'page'
	);
	$query = new WP_Query($args);
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
	
	<div class="filter-button merk-button" data-merk-id="<?php echo $post->ID ?>">
		<h4><?php the_title(); ?></h4>
	</div>
	
	<?php endwhile; endif; wp_reset_query(); ?>
</div>

<div id="waar-container">
<h3 id="waar-coming">More dealers coming soon</h3>
<?php
if( have_rows('dealer_item') ):
while ( have_rows('dealer_item') ) : the_row(); 
 
// Make variable from brand page ID
$merkenArray = get_sub_field('merken_beschikbaar'); 

?>
	<div class="waar-item
	<?php // Check if has brand
	if ($merkenArray[0]) 
	// Make class with Brand ID	
	{ ?>
	waar-item-merk-<?php echo $merkenArray[0]; 
	}
	if ($merkenArray[1]) { ?>
	waar-item-merk-<?php echo $merkenArray[1]; 
	}
	if ($merkenArray[2]) { ?>
	waar-item-merk-<?php echo $merkenArray[2]; 
	}
	if ($merkenArray[3]) { ?>
	waar-item-merk-<?php echo $merkenArray[3]; 
	}	
	if ($merkenArray[4]) { ?>
	waar-item-merk-<?php echo $merkenArray[4]; 
	}	
	?>

	">
		<div class="waar-item-img" style="background-image: url(<?php the_sub_field('dealer_icon'); ?>)">
		</div>
		<div class="waar-item-content">
			<div class="waar-item-content-cont">
				<div class="waar-item-content-naam">
					<?php the_sub_field('dealer_naam'); ?>
				</div>
				<?php if (get_sub_field('dealer_telefoon')) { ?>
					<a href="tel:<?php the_sub_field('dealer_telefoon'); ?>" class="waar-item-content-telefoon">
					T: <?php the_sub_field('dealer_telefoon'); ?>
					</a>
				<?php } ?>
				<?php if (get_sub_field('dealer_mail')) { ?>
					<a href="mailto:<?php the_sub_field('dealer_mail'); ?>" class="waar-item-content-email">
					E: <?php the_sub_field('dealer_mail'); ?>
					</a>
				<?php } ?>
				<a href="<?php the_sub_field('dealer_url'); ?>" target="_blank" class="waar-item-content-url">
					<?php the_sub_field('dealer_url'); ?>
				</a>
			</div>
		</div>
	</div>
<?php 
endwhile;
else :
?>
    <p>Neem contact met ons op voor meer informatie</p>
<?php endif; ?>
</div>



<?php get_footer(); ?>