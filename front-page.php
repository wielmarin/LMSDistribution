<?php get_header(); ?>

<div id="hero">
	<div id="hero-text" class="center">
		<h1 id="hero-text-heading" class="center">
			Digitale technologie voor scholen & bedrijven
		</h1>
		<h2 id="hero-text-subheading" class="center">
			Uw added value partner
		</h2>
		<a id="hero-text-link" href='/producten/' class="btn">
			Bekijk merken
		</a>
	</div>
</div>

<div id="pitch" class="itemcont center">

	<div class="pitch-title-box">
		<h2 id="pitch-title" class="center">
		Over LMS Distribution
		</h2>
		<div class="underline"></div>
	</div>
	<div id="pitch-text" class="center">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<a id="hero-text-link" href='http://localhost/lms/contact/' class="btn2">
			Adviesgesprek aanvragen >
		</a>
	</div>
	
</div>

<div id="frontproducts" class="itemcont">

	<div id="frontproducts-1" class="frontproduct">
		<div id="frontproducts-1-img" class="frontproduct-img">
		
		</div>
		<div id="frontproducts-1-text" class="frontproduct-text center">
			<h3 id="frontproducts-1-text-title" class="frontproduct-text-title">
				I3-technologies
			</h3>
			<p id="frontproducts-1-text-descr" class="frontproduct-text-descr">
				I3-technologies is een van de toonaangevende fabrikanten ter wereld van interactieve technologieën voor groepssamenwerking.
			</p>
			<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="http://lmsdistribution.nl/producten/i3-technologies/">
				Bekijk producten <i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
	<div id="frontproducts-2" class="frontproduct">
		<div id="frontproducts-2-img" class="frontproduct-img">
		
		</div>
		<div id="frontproducts-2-text" class="frontproduct-text center">
			<h3 id="frontproducts-2-text-title" class="frontproduct-text-title">
				LeftClick
			</h3>
			<p id="frontproducts-1-text-descr" class="frontproduct-text-descr">
				LeftClick biedt hard- en software voor narrowcasting die het fundament vormen van uw bedrijfscommunicatie. Plug & play of volledig op maat.
			</p>
			<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="http://lmsdistribution.nl/producten/leftclick/">
				Bekijk producten <i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
	<div id="frontproducts-3" class="frontproduct">
		<div id="frontproducts-3-img" class="frontproduct-img" class="frontproduct-img">
		
		</div>
		<div id="frontproducts-3-text" class="frontproduct-text center">
			<h3 id="frontproducts-3-text-title" class="frontproduct-text-title">
				Smart Metals 
			</h3>
			<p id="frontproducts-1-text-descr" class="frontproduct-text-descr">
				SmartMetals biedt een compleet assortiment aan slimme vloer-, wand- en plafondmontage oplossingen, standaard en op maat, voor flat panels en projectoren.
			</p>
			<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="http://lmsdistribution.nl/producten/smart-metals/">
				Bekijk producten <i class="fas fa-angle-right"></i>
			</a>
		</div>
	</div>
	<div id="frontproducts-4" class="frontproduct">
		<div id="frontproducts-4-img" class="frontproduct-img">
		
		</div>
		<div id="frontproducts-4-text" class="frontproduct-text center">
			<h3 id="frontproducts-4-text-title" class="frontproduct-text-title">
				Turning Technologies
			</h3>
			<p id="frontproducts-1-text-descr" class="frontproduct-text-descr">
				Improve presentations, enhance learning and get instant feedback with our easy-to-use interactive technology.
			</p>
			<a id="frontproducts-1-text-link" class="frontproduct-text-link" href="http://lmsdistribution.nl/producten/turning-technologies/">
				Bekijk producten <i class="fas fa-angle-right"></i>
			</a>		
		</div>
	</div>
</div>

<div class="button">
<a class="btn3" href="http://localhost/lms/producten/">
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
       
        
        <div id="excerptimage" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
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



<?php get_footer(); ?>