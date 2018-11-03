   <!-- Slides control -->   
    <div class="cycle-slideshow"
        data-cycle-slides=".slide"
        data-cycle-timeout="8000"
        data-cycle-prev="#prev"
        data-cycle-next="#next"
    >
    <i id="prev" class="fas fa-chevron-left fa-1x slider-left"></i>
    <i id="next" class="fas fa-chevron-right fa-1x slider-right"></i>
    <!-- Testimonial Text -->
            

<!------ Fill frontpage slider automatically -------->			
<?php
	$my_query = new WP_Query( array(
		'post_type'      => 'case',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	));
	
	while ( $my_query->have_posts() ) : $my_query->the_post(); 
?>
		<!---- Each individual slide ---->
			<div class="slide">
                <div class="slide-text">
					<div class="slide-logo">
						<img src="<?php the_field('frontpage_logo'); ?>" width="150px" height="true">
					</div>
                  
                       <p><?php the_field('frontpage_tekst'); ?></p>
                  
                    <span class="fronttestimonial-slider--name">
                        <a href="<?php the_permalink(); ?>">Bekijk case study ></a>
                    </span>
                </div>
            </div>
<?php endwhile; ?>
 
       
       
    </div>