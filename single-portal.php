

<div id="breadcrumbtrail">
							
<span class="breadcrumbportal" onClick="window.location.reload()">Portal</span><p> / </p><?php
breadcrumb_trail();
?> 
</div>

<!---- BACK BUTTON --------->
<div id="portal-back">
	<?php global $post;
	  if ( $post->post_parent ) { ?>
		<a href="<?php echo get_permalink( $post->post_parent ); ?>" >
		<i class="fas fa-arrow-left"></i> Terug
		</a>
	<?php } ?>
</div>


<?php $member_level = SwpmMemberUtils::get_logged_in_members_level(); ?>

<div id="pdflist">

<!--- NOT membership specific ---->
<?php if( get_field('lidmaatschapniveau_specifiek') == 'ja' && $member_level == "3") { ?>

	<!---- Dealer Content ---->
		<?php if( have_rows('upload_bestanden_dealers') ): ?>


			<?php while( have_rows('upload_bestanden_dealers') ): the_row(); 

				// vars
				$fileDealer = get_sub_field('bestand_dealer');
				

				?>

				<div id="filelink" class="externalfile" url="<?php echo $fileDealer['url']; ?>">
					<p>
						<?php echo $fileDealer['title']; ?>
					</p>
					<span class="filetype">
						<?php 
							$urlDealer = $fileDealer['url'];
							$extDealer = pathinfo($urlDealer, PATHINFO_EXTENSION); 
							echo $extDealer;
						?>
					</span>
					<span class="filesize">
						<?php
							$fileDealersize = filesize( get_attached_file( $fileDealer['id'] ) );
							$fileDealersize = size_format($fileDealersize, 2);
							echo $fileDealersize;
						?>
					</span>
				</div>
			<?php endwhile; ?>
		<?php else : ?> <!--- If no content available ---->
			<p>Er is geen informatie beschikbaar</p>
		<?php endif; ?> <!--- End of content availability check --->






<?php } elseif( get_field('lidmaatschapniveau_specifiek') == 'ja'  && $member_level == "4") { ?>

		<!---- Partner Content ---->
		<?php if( have_rows('upload_bestanden_partners') ): ?>


			<?php while( have_rows('upload_bestanden_partners') ): the_row(); 

				// vars
				$filePartner = get_sub_field('bestand_partner');
				

				?>

				<div id="filelink" class="externalfile" url="<?php echo $filePartner['url']; ?>">
					<p>
						<?php echo $filePartner['title']; ?>
					</p>
					<span class="filetype">
						<?php 
							$urlPartner = $filePartner['url'];
							$extPartner = pathinfo($urlPartner, PATHINFO_EXTENSION); 
							echo $extPartner;
						?>
					</span>
					<span class="filesize">
						<?php
							$filePartnersize = filesize( get_attached_file( $filePartner['id'] ) );
							$filePartnersize = size_format($filePartnersize, 2);
							echo $filePartnersize;
						?>
					</span>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p>Er is geen informatie beschikbaar</p>
		<?php endif; ?> <!--- End check if files exist --->


<?php } else { ?>
	

	<!---- Loop through ACF repeater field ---->
	<?php if( have_rows('upload_bestanden') ): ?>


		<?php while( have_rows('upload_bestanden') ): the_row(); 

			// vars
			$file = get_sub_field('bestand');
			

			?>

			<div id="filelink" class="externalfile" url="<?php echo $file['url']; ?>">
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
			</div>
		<?php endwhile;?>
	<?php endif; ?>
		
<?php } ?> <!-- End of member specific check --->
</div>


<!--- Tiles --->
<?php

$args = array(
    'post_type'      => 'portal',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>
	
		<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
		
	<a 
		id="parent-<?php the_ID(); ?>" 
		class="portalbox" 
		href="<?php the_permalink(); ?>" 
		title="<?php the_title(); ?>"

	>
			<div class="portalbox-image"
				<?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php the_post_thumbnail_url('portalbox-image'); ?>)" 
				<?php } else { ?>
					style="background-image: url(/wp-content/uploads/2018/08/SmallLogo.jpg); background-size: 95%;"
				<?php } ?>>
			</div>
					<p class="portalbox-title"><?php the_title(); ?></p>

	</a>
		
		<?php endwhile;	?>
	
<?php endif; wp_reset_postdata(); ?>
