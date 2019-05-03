</div><!-- container -->
<div class="site-footer">
	<div id="connectedrow">
		<div id="connectedrow-social">
			<h3 id="connectedrow-social-title">
				Volg LMS Distribution via:
			</h3><br>
			<span id="connectedrow-social-icons">
				<a href="https://www.facebook.com/LMS-Distribution-345105256252700/"><img src="/wp-content/uploads/2018/08/if_facebook_square_107117.png" alt="Facebook" width="40px" height="true"></a>
				<img src="/wp-content/uploads/2018/08/if_linkedin_square_color_107091.png" alt="linkedin" width="40px" height="true">
				
				
			</span>
		</div>
		<div id="connectedrow-news">
			<h3>
				Exclusieve aanbiedingen en nieuws</h3>
				<p>Mis het niet en meld u aan voor onze nieuwsbrief.
			</p>
			<span id="connectedrow-news-aanmelden">
				<?php echo do_shortcode('[contact-form-7 id="105" title="Nieuwsbrief"]'); ?>
			</span>
		</div>
	</div>
	<div id="footerlist">
		<div id="footerlist-1" class="footerlist-item">
			<h3 id="footerlist-1-title" class="footerlist-item-title">
				Merken
			</h3>
		<!---- Auto-generate merk links ---->
		<?php
			$my_query = new WP_Query( array(
				'post_type'      => 'page',
				'cat' => 4,
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'post__not_in' => array(3127), // HIDING VESTEL!
				'orderby'        => 'menu_order'
			));
			while ( $my_query->have_posts() ) : $my_query->the_post(); 
		?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
		<?php endwhile; ?>
				
		</div>
		<div id="footerlist-2" class="footerlist-item">
			<h3 id="footerlist-2-title" class="footerlist-item-title">
				Advies Nodig?
			</h3>
			<a href="/contact">Contact</a><br>
			<a href="/waar-te-koop">Waar te koop?</a>
		</div> 
		<div id="footerlist-3" class="footerlist-item">
			<h3 id="footerlist-3-title" class="footerlist-item-title">
			Partners
			</h3>
			<a href="/membership-login">Partner portal</a><br>
			<a href="/dealer-worden">Dealer worden</a><br>
			<a href="/demo-aanvragen">Demo aanvragen</a>
			
		</div>
		<div id="footerlist-4" class="footerlist-item">
			<h3 id="footerlist-4-title" class="footerlist-item-title">
				LMS Distribution
			</h3>
			T: <a href="tel:085-0703058">085-0703058</a><br>
			E: <a href="mailto:info@lmsdistribution.nl">info@lmsdistribution.nl</a><br>
			<a href="https://www.google.com/maps/place/Toepadweg+10,+5301+KA+Zaltbommel,+Nederland/@51.8093832,5.2660447,17z/data=!4m5!3m4!1s0x47c6f3f2b1420c0b:0x5d4d2ef48537dec3!8m2!3d51.8093832!4d5.2682334" target="_blank">Toepadweg 10<br>
			5301 KA Zaltbommel</a><br>
			<a href="/over-ons">Over Ons</a>
			
		</div>
	</div>
	
	<div id="bottomline">
		<div class="copyright">
			
		
		<nobr><p><a href="http://lmsdistribution.nl/privacy-en-cookieverklaring/">Privacy statement</a></p></nobr>  <span>|</span> <nobr><p><a href="/wp-content/uploads/2018/11/Algemene-voorwaarden-LMS-Distribution-2.pdf">Algemene voorwaarden</a></p></nobr> <span>|</span> <nobr><p>&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?></p></nobr>
		
		</div>
	</div>
</div>



<?php wp_footer(); ?>  

<script>
  window.FontAwesomeConfig = {
    searchPseudoElements: true
  }
</script>
</div>
</body>
</html>