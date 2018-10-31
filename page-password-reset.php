<?php get_header(); ?>

<!--- BASIC PAGES, INCLUDING HOME ---->



<!----------------- THE CONTENT --------------->

<div id="loginpage-background">
	<div id="loginpage">

		<div id="loginpage-aanvragen">
			<h2 id="loginpage-titel">Wachtwoord vergeten?</h2>
			<div class="underline"></div>
			<h3 id="loginpage-titel">Vraag hier een nieuwe wachtwoord aan</h3>
			<div id="maintext">
	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
			endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
			
			</div>

		</div>

		<div id="loginpage-aanvragen">
			<h2 id="loginpage-titel">Nog geen account?</h2>
			<div class="underline"></div>
			<h3 id="loginpage-titel">Vraag een login aan</h3>
			<p>Logins voor de partner portal zijn beschikbaar voor klanten die onze producten en software gebruiken en voor onze Channel-partners.</p>
			<a class="btnportal" href="/contact">
			Login aanvragen >
			</a>
		</div>

	</div>
</div>

<div id="mainimage">
		<?php	
			if ( has_post_thumbnail() ) {
			the_post_thumbnail('medium');
			} 
		?>
</div>
<?php get_footer(); ?>