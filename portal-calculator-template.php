<?php /* Template Name: Calculator
* Template Post Type: portal
*/ ?>

<div id="breadcrumbtrail">
							
<span class="breadcrumbportal" onClick="window.location.reload()">Portal</span><p> / </p><?php
breadcrumb_trail();
?> 
</div>

<!---- BACK BUTTON --------->
<div id="portal-back">
	<?php global $post;
	  if ( $post->post_parent ) { ?>
		<a href="<?php echo get_permalink( $post->post_parent ); ?>" >
		<i class="fas fa-arrow-left"></i> Terug
		</a>
	<?php } ?>
</div>


<?php $member_level = SwpmMemberUtils::get_logged_in_members_level(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    ?>
	<h3 id="calculator-omschrijving"><?php the_content(); ?></h3>
<?php
    endwhile; else: ?>
    <h3 id="calculator-omschrijving">Product prijs en termijn calculator</h3>
<?php endif; ?>


<?php if( have_rows('calculator_products') ):
while( have_rows('calculator_products') ): the_row(); ?>

<div class="calculator-product-row">
	<?php
	$post_object = get_sub_field('product');
	if( $post_object ): 
	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	?>
    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	
	<input id="calculator-quantity-<?php echo get_row_index(); ?>" type="number" name="calculator-quantity-<?php echo get_row_index(); ?>" min="0" max="50" value="0" />
	
	<p id="calculator-unit-price-<?php echo get_row_index(); ?>"><?php the_sub_field('unit_price'); ?></p>
	
	<p id="calculator-subtotal-row-<?php echo get_row_index(); ?>" class="calculator-subtotal-class" subtotal="0">0€</p>
	
<?php endif; ?>
</div>


<?php endwhile; ?>
<?php else : ?> <!--- If no content available ---->
	<h3>Leftclick calculator coming soon</h3>
<?php endif; ?> <!--- End of content availability check --->

<div id="calculator-total">Totaal : <span>0</span>€</div>
<div id="calculator-termijn">
	Verspreiden over <input id="calculator-termijn-input" type="number" name="calculator-termijn-input" min="1" max="60" value="1" /> maanden - Totaal per maand = <span>0</span>€
</div>


<script>

	jQuery('.calculator-product-row').each(function(i) {
		var rowIndex = i + 1; // Correct row number
		// Get each indivual price
		var unit = jQuery('#calculator-unit-price-' + rowIndex).html();
		var total = 0;
		
		jQuery('#calculator-quantity-' + rowIndex).change(function() {
			// Set total to 0
			var total = 0;
			// Get number from input
			var quantity = jQuery(this).val();
			// Initial subtotal (number x price)
			var rowSubtotalFloatingPoint = quantity * unit;
			// Fix for floating point error
			var rowSubtotal = rowSubtotalFloatingPoint.toFixed(2) 
			// Update html and data-attribute
			jQuery("#calculator-subtotal-row-" + rowIndex).html(rowSubtotal + "€").attr('subtotal',rowSubtotal);
			
			// Loop through all rows again, adding 'subtotal' to running total
			jQuery('.calculator-subtotal-class').each(function() {
				total += +jQuery(this).attr('subtotal');
			});
			
			// Write total to html
			jQuery('#calculator-total span').html(total);
			
			// Calculate total per month when subtotals change
				var termijnTotal = total / jQuery('#calculator-termijn-input').val();
				jQuery('#calculator-termijn span').html(termijnTotal.toFixed(2));
				
			// Calculate total per month when number of months changes
			jQuery('#calculator-termijn-input').change(function() {
				console.log('Changed');
				var termijnTotal = total / jQuery('#calculator-termijn-input').val();
				jQuery('#calculator-termijn span').html(termijnTotal.toFixed(2));
			});
			
		});			
	});

</script>