<?php

/* Template Name: Portal Tile Menu
Template Post Type: page
*/

?>

<div id="breadcrumbtrail">
<span class="breadcrumbportal" onClick="window.location.reload()">Portal</span><p> / </p><?php
breadcrumb_trail();
?>
</div>

<div id="pdflist">

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

	<?php endwhile; ?>


<?php endif; ?>



</div>


<!--- Tiles --->
<?php

$args = array(
    'post_type'      => 'page',
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
					style="background-image: url(/lms/wp-content/uploads/2018/08/SmallLogo.jpg); background-size: 95%;"
				<?php } ?>>
			</div>
					<p class="portalbox-title"><?php the_title(); ?></p>

	</a>
		
		<?php endwhile;	?>
	
<?php endif; wp_reset_postdata(); ?>
