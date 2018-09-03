<?php /* Template Name: Individual Product
* Template Post Type: post, page
*/ ?>

<?php get_header(); ?>

<!----------------- Banner --------------->
<div id="hero-sub">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			<?php the_title(); ?>
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>

<!---- Product Info en Foto ----->

<div id="individual">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="individual-left">
		<img src="<?php the_post_thumbnail_url(); ?>" width=100% height=true alt="Product Voorbeeld">
	</div>
	<div id="individual-right">
		<div id="individual-right-text">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; else: ?>
	<p>Informatie over deze product komt binnenkort</p>
<?php endif; ?>
</div>

<!--- Functie Overzicht ---->
<div id="functieoverzicht">
	<h2>Functie Overzicht<span id="functieoverzicht-underline"></span></h2>
	<div id="functieoverzicht-container">
		
			<?php if( have_rows('functieoverzicht') ): ?>
				<?php while( have_rows('functieoverzicht') ): the_row(); ?>
					<div id="functieoverzicht-item">
						<img id="functieoverzicht-icon" src="<?php the_sub_field('functie_icon'); ?>">
						<div id="functieoverzicht-info">
							<h3><?php the_sub_field('functie_titel'); ?></h3>
							<p><?php the_sub_field('functie_tekst'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		
	</div>
</div>

<!--- Downloads en Similar ---->
<div id="individual-extras">
	
	<div id="individual-downloads">
		<h2>Downloads</h2>
		
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
	</div>
	
	<!------ Related Products Block ----->
	<div id="individual-related">
		<h2>Gerelateerde Producten</h2>
	
	
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
						style="background-image: url(/lms/wp-content/uploads/2018/08/portal-video-poster-1-e1535286490910.jpg)"
					<?php } ?>>
				</div>
				<div id="individual-related-block-text" class="center">
					<h3 id="individual-related-block-text-title">
						<?php the_title(); ?>
					</h3>
					<a id="individual-related-block-text-link" href="<?php the_permalink(); ?>">
						Take a look <i class="fas fa-angle-right"></i>
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

<?php get_footer(); ?>