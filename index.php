<?php

get_header();
 ?>
 
<div id="hero-sub">
	<div id="hero-sub-text" class="center">
		<h1 id="hero-sub-text-heading" class="center">
			Nieuws
		</h1>
		<div id="border-subpage"></div>
	</div>
</div>
 

<!-- body -->
<div id="blogpagecontainer">   
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>

    <div id="excerptcontainer">
       
        <?php  $post_thumbnail_id = get_post_thumbnail_id();
        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>
        <div id="excerptimage" style="background-image:url(<?php echo $post_thumbnail_url; ?>)">
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

<?php
    endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>

<?php

get_footer();

?>