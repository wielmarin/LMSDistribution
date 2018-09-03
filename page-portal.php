<?php

get_header(); 

?>

<div id="portal-hero">
	<h1 id="portal-hero-heading">
		Partner Portal
		<div id="border-subpage"></div>
	</h1>
	
</div>

<div id="pitch" class="itemcont center">
<?php if(SwpmMemberUtils::is_member_logged_in()) { ?>
	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		Welkom bij de partner portal
		</h2>
		<div class="underline"></div>
	</div>
	<div id="pitch-text" class="center">
		<p>Welkom bij de partner portal van LMS Distribution. In de onderstaande sectie kunt u de content zien die voor u beschikbaar is. Kunt u iets niet vinden, of heeft u vragen? Neem dan contact met ons op. We helpen u graag verder.</p>
		<a id="hero-text-link" href='#' class="btn2">
			Contact opnemen >
		</a>
	</div>
	
</div>

<div id="portal-content">
	<div id="portal-content-banner">
		<h2>
			Partner Portal
		</h2>
	</div>
	<div id="portal-content-side">
		<div id="portal-content-side-title">
			Portal <span>categories</span>
		</div>
		<div id="portal-content-side-list" class="portalmenu">
							 <?php
								$args = array(
								'theme_location' => 'portal'
								);
							?>
							<?php wp_nav_menu( $args ); ?>
							
							
			<!--				
			<ul>
				<li id="list-producten">
					Producten
					<ul>
						<li>
							Hardware
						</li>
						<li>
							Software
						</li>
						<li>
							Accessories
						</li>
					</ul>
				</li>
				<li id="list-service">
					Service
				</li>
				<li id="list-marketing">
					Marketing Materials
				</li>
				<li id="list-sales">
					Sales Tools
				</li>
				<li id="list-price">
					Pricelists
				</li>
				<li id="list-tender">
					Tender Specs
				</li>
			</ul>
			
			-->
		</div>
	</div>
	<div id="portal-content-right">
		<div id="portal-content-right-banner">
			
		</div>
		
		<!-- Tiles will appear here -->
		<div id="portal-content-right-space" class="ajaxspace">

			<div id="breadcrumbtrail">
			<?php
			breadcrumb_trail();
			?>
			</div>
			<!----- Get Tiles automatically ----->
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
					
					<a id="parent-<?php the_ID(); ?>" class="portalbox" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					
			<div class="portalbox-image"
				<?php if (has_post_thumbnail() ) { ?> 
					style="background-image: url(<?php the_post_thumbnail_url('portalbox-image'); ?>)" 
				<?php } else { ?>
					style="background-image: url(/lms/wp-content/uploads/2018/08/portal-video-poster-1-e1535286490910.jpg)"
				<?php } ?>>
			</div>
			<p class="portalbox-title"><?php the_title(); ?></p>

		</a>
					
					<?php endwhile;	?>
				
			<?php endif; wp_reset_postdata(); ?>
			
		</div>
	</div>
</div>

<div id="advised">
	<div id="advised-banner">
		<h2>
			Contact
		</h2>
	</div>
	<div id="advised-contact">
		<div id="advised-contact-box-1" class="advised-contact-box">
			<img src="/lms/wp-content/uploads/2018/08/shop-icon.png">
			<div class="advised-contact-box-text">
				<h3>
					Marketing
				</h3>
				<p>
					Mail: info@lmsdistribution.nl
				</p>
				<p>
					Tel: 085-0703058
				</p>
			</div>
		</div>
		<div id="advised-contact-box-2" class="advised-contact-box">
			<img src="/lms/wp-content/uploads/2018/08/shop-icon.png">
			<div class="advised-contact-box-text">
				<h3>
					Branding
				</h3>
				<p>
					Mail: info@lmsdistribution.nl
				</p>
				<p>
					Tel: 085-0703058
				</p>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
<p>You must be a member to view Portal Content. Click <a href="#">here</a> to sign up or <a href="#">here</a> to log in.</p>

<?php } ?>
</div>

<?php

get_footer();

?>