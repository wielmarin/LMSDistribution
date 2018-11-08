<?php get_header(); ?>

<div id="hero-sub" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.4) 0%, rgba(0, 0, 5, 0.4) 20%, rgba(0, 0, 5, 0.4) 40%, rgba(0, 0, 5, 0.4) 100%), url(<?php the_post_thumbnail_url('full-banner'); ?>); <?php if(get_field('background_positie')) : ?> background-position: <?php the_field('background_positie'); endif;?> ">
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
			<h2 class="advies-titel">Neem contact op
			<div id="advies-border"></div>
			</h2>
			<p>Laat uw gegevens achter en wij nemen zo snel mogelijk contact met u op.</p>
			<div id="contactgegevens">
				<p><i class="fas fa-phone"></i> <a href="tel:085-0703058">085-0703058</a></p><br>
				<p><i class="fas fa-envelope"></i> <a href="mailto:Info@lmsdistribution.nl">Info@lmsdistribution.nl</a></p><br>
				<p><i class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/Toepadweg+10,+5301+KA+Zaltbommel,+Nederland/@51.8093832,5.2660447,17z/data=!4m5!3m4!1s0x47c6f3f2b1420c0b:0x5d4d2ef48537dec3!8m2!3d51.8093832!4d5.2682334">Toepadweg 10 <br>5301 KA Zaltbommel</a></p> 
			</div>
			
		</div>

		<div id="advies-contact">
			<?php echo do_shortcode('[contact-form-7 id="104" title="Contactformulier 1"]'); ?>
		</div>
	</div>
</div>

<div id="maps">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2466.8236316289376!2d5.266044715349453!3d51.80938317968585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6f3f2b1420c0b%3A0x5d4d2ef48537dec3!2sToepadweg+10%2C+5301+KA+Zaltbommel%2C+Nederland!5e0!3m2!1snl!2ses!4v1536655134323" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php get_footer(); ?>
