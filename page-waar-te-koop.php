<?php get_header(); ?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url(); ?>);">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			<?php the_title(); ?>
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="pitch" class="itemcont center">

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

<div id="waar-container">
<?php
if( have_rows('dealer_item') ):
while ( have_rows('dealer_item') ) : the_row(); ?>
	<div class="waar-item">
		<div class="waar-item-img" style="background-image: url(<?php the_sub_field('dealer_icon'); ?>)">
		</div>
		<div class="waar-item-content">
			<div class="waar-item-content-cont">
				<div class="waar-item-content-naam">
					<?php the_sub_field('dealer_naam'); ?>
				</div>
				<a href="tel:<?php the_sub_field('dealer_telefoon'); ?>" class="waar-item-content-telefoon">
					T: <?php the_sub_field('dealer_telefoon'); ?>
				</a>
				<a href="mailto:<?php the_sub_field('dealer_mail'); ?>" class="waar-item-content-email">
					E: <?php the_sub_field('dealer_mail'); ?>
				</a>
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