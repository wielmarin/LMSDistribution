<?php

get_header();
 ?>
 
<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url(); ?>);">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			<?php the_title(); ?>
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<div id="cases" class="itemcont center">

	<?php

		// check if the repeater field has rows of data
		if( have_rows('case_studies') ):
			// loop through the rows of data
			while ( have_rows('case_studies') ) : the_row();
	?>
			<div id="case-content">
				<div id="case-image" style="background-image: url(<?php the_sub_field('case_image'); ?>); ">
				</div>
				<div id="case-text">
					<?php the_sub_field('case_tekst'); ?>
				</div>
			</div>
	<?php
			endwhile;
		else :
	?>
		<p>Case Studies komen snel</p>
	<?php
		endif;
	?>
	
</div>

<div id="advies-background">
	<div id="advies">
		<div id="advies-tekst">
			<h2 class="advies-titel">Wilt u meer informatie over dit product?
			<div id="advies-border"></div>
			</h2>
			<p>Laat uw gegevens achter en wij nemen zo snel mogelijk contact met u op. U kunt ons ook telefonisch bereiken via <a href="tel:085-0703058">085-0703058</a>.</p>
		</div>

		<div id="advies-contact">
			<?php echo do_shortcode('[contact-form-7 id="104" title="Contactformulier 1"]'); ?>
		</div>
	</div>
</div>




<?php

get_footer();

?>