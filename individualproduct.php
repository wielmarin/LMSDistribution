<?php /* Template Name: Individual Product
* Template Post Type: post, page
*/ ?>

<?php get_header(); ?>

<!----------------- Banner --------------->
<?php $merkpage = get_field('merk'); ?>

<!---- Product Info en Foto ----->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="individual">	
	<span id="individual-breadcrumb">
		<?php
			breadcrumb_trail();
		?>
	</span>
	<div id="individual-left" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
	
	<div id="individual-right">
		<div id="individual-right-text">
			<h2>
				<?php if( get_field('alternatief_merk_titel')) :
					the_field('alternatief_merk_titel');
				else :
					echo get_the_title($merkpage); 
				endif; ?> 

			<?php the_title(); ?></h2>
			<h3><?php the_field('individual_product_subtitle'); ?></h3>
			<p><?php the_field('individual_product_samenvatting'); ?></p>
			<div class="buttonsp">
				<div class="buttonp1"><a href="/lms/demo-aanvragen"><?php the_field('individual_product_cta'); ?></a></div>
				<div class="buttonp2"><a href="/lms/waar-te-koop">Waar te koop? </a></div>
			</div>
		</div>
	</div>
</div>

<!-- Photo choices --->
<div id="product-image-container">
	<div id="product-image-1" class="product-image-block" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
	</div>

	
<?php if( have_rows('productpagina_extra_fotos') ):
	while( have_rows('productpagina_extra_fotos') ): the_row(); 
?>
			
		<!-- File Display -->
		<div id="product-image-4" class="product-image-block" style="background-image: url('<?php the_sub_field('extra_foto'); ?>');">
		</div>
		<!-- End File Display -->
		
	<?php endwhile; ?>
<?php endif; ?>
	
	
	
	
	
	
	
	
	
	
</div>

<div id="individual-content-background">
<div id="individual-content">
	<div id="individual-content-text">
		<?php the_content(); ?>
	</div>
	<div id="individual-downloads">
		<h3>Downloads</h3>
		
		<!-- Only show if there are uploads -->
		<?php if( have_rows('individual_product_manuals') ): ?>
		
	
		<div id="individual-downloads-manuals" class="individual-downloads-item">
			<!--- Button to show files --->	
			<div id="individual-downloads-manuals-button" class="download-button">
				<p>Manuals</p>
			</div>
			
	<!--- Begin looping here --->	
	<?php while( have_rows('individual_product_manuals') ): the_row(); 
	// vars
	$file = get_sub_field('product_manuals');
	?>
			
		<!-- File Display -->
		<a href="<?php echo $file['url']; ?>" id="filelink" class="individualdownload manualfile">
			<p>
				<?php echo $file['title']; ?>
			</p>
			<span class="filetype">
				<?php 
					$url = $file['url'];
					$ext = pathinfo($url, PATHINFO_EXTENSION); 
					echo $ext;
				?>
			</span>
			<span class="filesize">
				<?php
					$filesize = filesize( get_attached_file( $file['id'] ) );
					$filesize = size_format($filesize, 2);
					echo $filesize;
				?>
			</span>
		</a>
		<!-- End File Display -->
		
	<?php endwhile; ?>

	</div> <!-- End Block -->
<?php endif; ?>
		
		<!------ Tech Specs ---->
		<!-- Only show if there are uploads -->
		<?php if( have_rows('individual_product_techspecs') ): ?>
		
		<div id="individual-downloads-technical" class="individual-downloads-item">
			<div id="individual-downloads-technical-button" class="download-button">
				<p>Technical Specs</p>
			</div>
			
		<!--- Begin looping here --->	
		<?php while( have_rows('individual_product_techspecs') ): the_row(); 
		// vars
		$spec = get_sub_field('product_techspec');
		?>
		
		<!-- File Display -->
		<a href="<?php echo $spec['url']; ?>" id="filelink" class="individualdownload techfile">
			<p>
				<?php echo $spec['title']; ?>
			</p>
			<span class="filetype">
				<?php 
					$url = $spec['url'];
					$ext = pathinfo($url, PATHINFO_EXTENSION); 
					echo $ext;
				?>
			</span>
			<span class="filesize">
				<?php
					$specsize = filesize( get_attached_file( $spec['id'] ) );
					$spec_size = size_format($specsize, 2);
					echo $spec_size;
				?>
			</span>
		</a>
		
		
		<!-- End File Display -->
		
	<?php endwhile; ?>

	</div> <!-- End Block -->
<?php endif; ?>

	<!------ Drivers -------->
		<!-- Only show if there are uploads -->
		<?php if( have_rows('individual_product_drivers') ): ?>	
		<div id="individual-downloads-drivers" class="individual-downloads-item">
			<div id="individual-downloads-drivers-button" class="download-button">
				<p>Drivers</p>
			</div>
		<!--- Begin looping here --->	
		<?php while( have_rows('individual_product_drivers') ): the_row(); 
		// vars
		$drive = get_sub_field('product_driver');
		?>
		
			<!-- File Display -->
				<a href="<?php echo $drive['url']; ?>" id="filelink" class="individualdownload driverfile">
					<p>
						<?php echo $drive['title']; ?>
					</p>
					<span class="filetype">
						<?php 
							$url = $drive['url'];
							$ext = pathinfo($url, PATHINFO_EXTENSION); 
							echo $ext;
						?>
					</span>
					<span class="filesize">
						<?php
							$drivesize = filesize( get_attached_file( $drive['id'] ) );
							$drive_size = size_format($drivesize, 2);
							echo $drive_size;
						?>
					</span>
				</a>
				
				
				<!-- End File Display -->
				
			<?php endwhile; ?>

			</div> <!-- End Block -->
		<?php endif; ?>
		
		<!------ 
		Whitepapers -------->
		<!-- Only show if there are uploads -->
		<?php if( have_rows('individual_product_whitepapers') ): ?>	
		<div id="individual-downloads-whitepapers" class="individual-downloads-item">
			<div id="individual-downloads-whitepapers-button" class="download-button">
				<p>Whitepapers</p>
			</div>
		<!--- Begin looping here --->	
		<?php while( have_rows('individual_product_whitepapers') ): the_row(); 
		// vars
		$white = get_sub_field('product_whitepaper');
		?>
		
			<!-- File Display -->
				<a href="<?php echo $white['url']; ?>" id="filelink" class="individualdownload whitepaperfile">
					<p>
						<?php echo $white['title']; ?>
					</p>
					<span class="filetype">
						<?php 
							$url = $white['url'];
							$ext = pathinfo($url, PATHINFO_EXTENSION); 
							echo $ext;
						?>
					</span>
					<span class="filesize">
						<?php
							$whitesize = filesize( get_attached_file( $white['id'] ) );
							$white_size = size_format($whitesize, 2);
							echo $white_size;
						?>
					</span>
				</a>
				
				
				<!-- End File Display -->
				
			<?php endwhile; ?>

			</div> <!-- End Block -->
		<?php endif; ?>
	</div>
</div>

<?php endwhile; else: ?>
	<p>Informatie over deze product komt binnenkort</p>
<?php endif; ?>

</div>

<!--- Functie Overzicht ---->
<?php if( have_rows('functieoverzicht') ): ?>
<div id="functieoverzicht-background" style="background-image: linear-gradient(to bottom, rgba(0, 0, 5, 0.6) 0%, rgba(0, 0, 5, 0.6) 100%), url(<?php the_field('achtergrondafbeelding_functieoverzicht'); ?>); ">

<div id="functieoverzicht">
	<h2>Functie Overzicht<span id="functieoverzicht-underline"></span></h2>
	<div id="functieoverzicht-container">
		
			
				<?php while( have_rows('functieoverzicht') ): the_row(); ?>
					<div id="functieoverzicht-item">
						<img id="functieoverzicht-icon" src="<?php the_sub_field('functie_icon'); ?>">
						<div id="functieoverzicht-info">
							<h3><?php the_sub_field('functie_titel'); ?></h3>
							<p><?php the_sub_field('functie_tekst'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			
		
	</div>
</div>
</div>
<?php endif; ?>
<!--- Downloads en Similar ---->
<div id="individual-extras">
	
	
	
	<!------ Related Products Block ----->
	<div id="individual-related">
		<h2>Gerelateerde Producten
		<div id="individual-related-border"></div>
	</h2>
	
	<!-- Only show if there are uploads -->
	<?php if( have_rows('gerelateerd_producten') ): ?>
    <?php while( have_rows('gerelateerd_producten') ): the_row(); ?>
        <?php $post_object = get_sub_field('vergelijkbaar_product'); ?>
        <?php if( $post_object ): ?>
            <?php // override $post
            $post = $post_object;
            setup_postdata( $post );
            ?>
            <div id="individual-related-block">
				<div id="individual-related-block-img" <?php if (has_post_thumbnail() ) { ?> 
						style="background-image: url(<?php the_post_thumbnail_url(); ?>)" 
					<?php } else { ?>
						style="background-image: url(/lms/wp-content/uploads/2018/08/SmallLogo.jpg); background-size: contain;"
					<?php } ?>>
				</div>
				<div id="individual-related-block-text" class="center">
					<h3 id="individual-related-block-text-title">
						<?php the_title(); ?>
					</h3>
					<a id="individual-related-block-text-link" href="<?php the_permalink(); ?>">
						Bekijk product <i class="fas fa-angle-right"></i>
					</a>
				</div>
			</div>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
	
	
</div>

<!----------------- Demo aanvragen en Contact Form --------------->


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

<!----- CSS FOR STRIPE COLOURS UNDER H2 ----->
<style>
	
	.<?php the_field("merk_code", $merkpage); ?>stripe::after { border-bottom: 2px solid <?php the_field("merk_kleur", $merkpage) ?>!important };
</style>
<script>
	jQuery('#individual-related-border, #individual-related-block-text').css('border-color', '<?php the_field("merk_kleur", $merkpage); ?>');
	jQuery('.buttonp1 a, .buttonp2 a').css('border-color', '<?php if ( get_field("alternatief_kleur", $merkpage)) : the_field("alternatief_kleur", $merkpage); else: the_field("merk_kleur", $merkpage); endif; ?>');
	jQuery('.buttonp1 a').css('background', '<?php if ( get_field("alternatief_kleur", $merkpage)) : the_field("alternatief_kleur", $merkpage); else: the_field("merk_kleur", $merkpage); endif; ?>');
	jQuery('.buttonp2 a').css('color', '<?php if ( get_field("alternatief_kleur", $merkpage)) : the_field("alternatief_kleur", $merkpage); else: the_field("merk_kleur", $merkpage); endif; ?>');
	<!----- ADD CLASS FOR STRIPE COLOURS UNDER H2 ----->
	jQuery('#individual-content-text h2').addClass('<?php the_field("merk_code", $merkpage); ?>stripe');
</script>

<?php get_footer(); ?>