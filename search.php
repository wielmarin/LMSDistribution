<?php

get_header();
 ?>
 
<div id="hero-sub">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			Zoekresultaten
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>
 

<!-- body -->
<div id="titel-search"><h2>Zoekresultaten voor zoekopdracht '<?php the_search_query(); ?>'</h2>
<div id="titel-searchborder"></div>
</div>

<div id="blogpagecontainer">   
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>

    <div id="excerptcontainer">

        <div id="excerptimagesearch" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
        </div>   
		
		<div id="excerptcontainer-content">
			<div id="flex1" class="excerpttext">
				<div class="flex1text"></div>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			</div>
		   
			<div id="flex3" class="excerpttext">
				<div id="aboutomschrijving1" class="flexomschrijving"><p><?php echo get_the_excerpt(); ?> </p></div><a href="<?php the_permalink(); ?>" class="readmorelink">Bekijken</a>
			</div>
		</div>
		<div id="nieuws-border"></div>
    </div>

<?php
    endwhile; else: ?>
    <p>Sorry, geen resultaten gevonden.</p>
<?php endif; ?>
</div>

<?php

get_footer();

?>