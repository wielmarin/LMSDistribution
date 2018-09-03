<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
			<meta name="viewport" content="width=device-width">
			<meta name="description" content="<!-- FILL THIS IN LATER! -->"/>
			<title>LMS Distributions</title>
			
			<?php wp_head(); ?>
			
	<!---------- FONTS ---------->	
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
  
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">		

	<!--- JQUERY UI FOR EXTRA ANIMATION --->
	<script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script
			  
	<!-- Cycle2 slideshow controls -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.js"></script>
		
	</head>

<body <?php body_class(); ?>> 

<!-- Fixed Objects -->	
<div id="contactbutton" class="contact-small">
	<p id="contactbutton-label">
		Contact
	</p>
	<div id="contactbutton-info">
		<span id="contactbutton-phone">
			<i class="fas fa-phone"></i> 987 654 321
		</span>
		<span id="contactbutton-mail">
			<i class="far fa-envelope"></i> mail@adres.com
		</span>
		<i id="contactx" class="far fa-window-close"></i>
	</div>
</div>			
			
<!--- SITE HEADER --->
	<header class="site-header">
	
	<div class="header-right">	
		
		<div class="partner">Dealer worden </div>
	
	<!--- Login --->
	
		<div class="login"><a href="http://localhost/lms/portal/">Portal -</a>
			<?php echo do_shortcode('[swpm_mini_login]'); ?>
		</div>
		
	<!--- Login --->
	</div>
	
	<div class="header-bottom">	
	<!--- Logo --->
	
	<a class="logo" href="<?php echo get_home_url(); ?>">
		<img src="/lms/wp-content/uploads/2018/08/SmallLogo.jpg" width="150px" height="true" alt="LMS Distribution">
	</a>
	
	<!--- Logo --->

	<!--- Primary navigation --->
	<nav class="site-nav">

			<?php
				$args = array(
				'theme_location' => 'primary'
				);
			?>
			<?php wp_nav_menu( $args ); ?>	
				
	</nav>
	
	<!--- Search --->
	<i class="fas fa-search"></i>
	<?php get_search_form(); ?>
	
	</div>	
	
	
	</header>
<!-- /site-header -->

<div class="container">