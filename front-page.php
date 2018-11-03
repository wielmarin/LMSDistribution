<?php get_header(); ?>

<div id="hero">
	<div id="hero-text" class="center">
		<h1 id="hero-text-heading" class="center">
			<?php the_field('titel'); ?>
		</h1>
		<h2 id="hero-text-subheading" class="center">
			<?php the_field('subtitel'); ?>
		</h2>
		<a id="hero-text-link" href='<?php the_field('banner_cta_link'); ?>' class="btn">
			<?php the_field('cta_tekst'); ?>
		</a>
	</div>
</div>

<div id="pitch" class="itemcont center">

	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		<?php the_field('pitch_titel'); ?>
		</h2>
		<div class="underline"></div>
	</div>
	<div id="pitch-text" class="center">
			<p><?php the_field('pitch_tekst'); ?></p>
		<a id="hero-text-link" href='<?php the_field('pitch_cta_link'); ?>' class="btn2">
			<?php the_field('pitch_cta_tekst'); ?> >
		</a>
	</div>
	
</div>

<div id="frontproducts" class="itemcont homepageproducts">

<?php

		// check if the repeater field has rows of data
		if( have_rows('home_merken') ):
			// loop through the rows of data
			while ( have_rows('home_merken') ) : the_row();
?>
	<div id="frontproducts-1" class="frontproduct">
		<div id="frontproducts-1-img" class="frontproduct-img" style="background-image:url(<?php the_sub_field('home_merk_image'); ?>);">
		
		</div>
		<div id="frontproducts-1-text" class="frontproduct-text center">
			<h3 id="frontproducts-1-text-title" class="frontproduct-text-title">
				<?php the_sub_field('home_merk_titel'); ?>
			</h3>
			<p id="frontproducts-1-text-descr" class="frontproduct-text-descr">
				<?php the_sub_field('home_merk_tekst'); ?>
			</p>
			<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="<?php the_sub_field('home_merk_page'); ?>">
				Bekijk producten <i class="fas fa-angle-right"></i>
			</a>
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

<div class="button">
<a class="btn3" href="/lms/merken/">
			Bekijk alle merken >
</a>
</div>

<div id="frontusp">
		<div id="usp">
			<div id="usp-img"><img src="/wp-content/uploads/2018/09/ICON_WHITEBOARD_170x170blue-1.png" alt="whiteboard" width="" height="">
			</div>
			<div id="usp-text">Bestaande infrastructuur benutten
			</div>
		</div>
		<div id="usp">
			<div id="usp-img"><img src="/wp-content/uploads/2018/09/ICON_SHARE_170x170blue.png" alt="whiteboard" width="" height="">
			</div>
			<div id="usp-text">Creëren en delen, altijd en overal
			</div>
		</div>
		<div id="usp">
			<div id="usp-img"><img src="/wp-content/uploads/2018/09/ICON_BRIDGE_ANALOG_DIGITAL_170x170blue.png" alt="whiteboard" width="" height="">
			</div>
			<div id="usp-text">De analoge en digitale werelden overbruggen
			</div>
		</div>
</div>


<div id="fronttestimonial-slider">
	<div id="fronttestimonial-slider-titel"><h2>Case studies</h2><div class="underline-slider"></div>
	</div>
    <div id="fronttestimonial-slider-text">
        <?php get_template_part('slidebox'); ?>
    </div>
</div>

<div id="nieuws">
	<h2>Nieuws</h2>
	<div id="content-home-border"></div>
	<div id="nieuws-container">

		
<?php
$my_query = new WP_Query( array('showposts' => '4'));
while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			 <div id="excerptcontainer">
       
        
        <div id="excerptimage" style="background-image:url(<?php the_post_thumbnail_url('thumbnail'); ?>)">
        </div>   
		
		<div id="excerptcontainer-content">
			<div id="flex1" class="excerpttext">
				<div class="flex1text"><span><?php the_time('j/m/Y'); ?></span></div>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			</div>
		   
			<div id="flex3" class="excerpttext">
				<div id="aboutomschrijving1" class="flexomschrijving"><p><?php echo get_the_excerpt(); ?> ...</p></div><a href="<?php the_permalink(); ?>" class="readmorelink">Lees artikel</a>
			</div>
		</div>
		<div id="nieuws-border"></div>
    </div>
			
<?php endwhile; ?>
				
			

	</div>
</div>

<!----- 
Homepage Banner Slideshow
Change images in options tab
----->
<?php
	if( have_rows('homepage_banner', 'option') ):
?>
<script>
jQuery("#hero").backstretch([
<?php while ( have_rows('homepage_banner', 'option') ) : the_row(); 
?>
	"<?php the_sub_field('banner_beeld'); ?>",
<?php endwhile; ?>
	],
	{transitionDuration: 800},
	);
</script>
<? endif; ?>




<?php get_footer(); ?>