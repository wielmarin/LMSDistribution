<?php

get_header(); 

?>





<div id="portal-hero">
	<h1 id="portal-hero-heading">
		Welkom bij het <span>Partner Portal</span>
	</h1>
</div>

<div id="portal-welcome">
	<div id="portal-welcome-text">
		<h2 id="portal-welcome-text-title">
			Welkom bij het Partner Portal
		</h2>
		<p id="portal-welcome-text-descr">
			Hier vind je de dingen wat partners krijgen. Want jij bent special.
		</p>
	</div>
	<div id="portal-welcome-video">
		<img src="/lms/wp-content/uploads/2018/08/portal-video-poster.jpg" width=100%>
	</div>	
</div>

<div id="portal-content">
	<div id="portal-content-banner">
		<h2>
			Portal
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
			Advised Contacts
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
					Mail: marketing@i3-technologies.com
				</p>
				<p>
					Tel: +32 492 580 160
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
					Mail: marketing@i3-technologies.com
				</p>
				<p>
					Tel: +32 492 580 160
				</p>
			</div>
		</div>
	</div>
</div>


<?php

get_footer();

?>