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
while( have_rows('calculator_products') ): the_row();
?>

<div id="calculator-product-row-<?php echo get_row_index();?>" class="calculator-product-row">
	<?php
	$post_object = get_sub_field('product');
	if( $post_object ): 
	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	
	$rowIndex = get_row_index();
	?>
    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	
	<input id="calculator-quantity-<?php echo $rowIndex; ?>" type="number" name="calculator-quantity-<?php echo get_row_index(); ?>" min="0" max="50" value="0" />
	
	<?php if(get_sub_field('vaste_prijs') == 'ja'): ?>
		<p id="calculator-unit-price-<?php echo get_row_index(); ?>"><?php the_sub_field('unit_price'); ?></p>
	<?php endif; ?>
	
	<p id="calculator-subtotal-row-<?php echo get_row_index(); ?>" class="calculator-subtotal-class" subtotal="0">0€</p>
	
		<!--- Onderdelen loop ---->
		<?php if( have_rows('onderdelen') ):?>
		<div id="onderdelen-<?php echo $rowIndex; ?>" class="onderdelen" onderdeel-total="0" style="display: none;">
		<?php while ( have_rows('onderdelen') ) : the_row(); ?>
			<div id="onderdeel-container-<?php echo get_row_index(); ?>" class="onderdeel-container" style="display: block; width: 100%; font-size: 80%; padding: 2px 0px;">
				<p id="onderdeel-name-<?php echo get_row_index(); ?>" class="onderdeel-name"><?php the_sub_field('onderdeel_naam'); ?></p>
				<!--- Selector for number of each onderdeel --->
				<input id="onderdeel-quantity-<?php echo get_row_index(); ?>" type="number" name="onderdeel-quantity-<?php echo get_row_index();?>"
				<?php if(get_sub_field('aantal_gelijk') == 'ja') : ?> class="coupled" disabled="disabled" 
				<?php endif;?> 
				<?php if(get_sub_field('vaste_aantal') == 'ja') : ?> value="<?php the_sub_field('vaste_hoe_veel');?>" disabled="disabled" 
				<?php else : ?> value="0" min="<?php the_sub_field('minimum_selectie'); ?>" 
					<?php if(get_sub_field('maximaal_gelijk') == 'ja'): ?>
						class="maximum-gelijk" max="9999"
					<?php else :?>
						max="<?php the_sub_field('maximum_selectie'); ?>"
					<?php endif; ?>
				<?php endif ;?>
				/>
				
				<p id="onderdeel-prijs-<?php echo get_row_index(); ?>" class="onderdeel-prijs" unit="<?php the_sub_field('onderdeel_prijs'); ?>" onderdeelSubtotal="0">€0,00</p> 
				
			</div>
		
		<? endwhile;?>
		</div>
		<?php endif; ?>
		
	
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
var onderdeelTotal;
var quantity;
var unit;
var rowIndex;
var onderdeelForHTML;
var total;
	// Onderdelen maths function
	function onderdelenMaths() {
		jQuery('.onderdeel-container').each(function(j) {
		var onderdeelRowIndex = j + 1; // Correct row number
		// Get each indivual price
		var onderdeelUnit = jQuery('#onderdeel-prijs-' + onderdeelRowIndex).attr('unit');
		var onderdeelTotal = 0;	
			// Get number from input
			var onderdeelQuantity = jQuery("#onderdeel-quantity-" + onderdeelRowIndex).val();
			// Initial subtotal (number x price)
			var onderdeelRowSubtotalFloatingPoint = onderdeelQuantity * onderdeelUnit;
			// Fix for floating point error
			var onderdeelRowSubtotal = onderdeelRowSubtotalFloatingPoint.toFixed(2);
			// Update html and data-attribute
			jQuery("#onderdeel-prijs-" + onderdeelRowIndex).html(onderdeelRowSubtotal + "€").attr('onderdeelsubtotal',onderdeelRowSubtotal);
			
			// Loop through all rows again, summing onderdeel prices and adding to the div attr
			jQuery('.onderdeel-prijs').each(function() {
				onderdeelTotal += +jQuery(this).attr('onderdeelsubtotal');
				// Write total to product subtotal and HTML
				jQuery(this).closest('.onderdelen').attr('onderdeel-total', onderdeelTotal.toFixed(2));
			});
			
		});
	};	// END FUNCTION
	
	
	
	jQuery('.calculator-product-row').each(function(i) {
		var rowIndex = i + 1; // Correct row number
		// Get each individual price if specified, save as variable
		if(jQuery('#calculator-unit-price-' + rowIndex).length > 0) {
			var unit = jQuery('#calculator-unit-price-' + rowIndex).html();
		} else {
			// Avoid NaN
			var unit = 0;
		}
		// Reset total
		var total = 0;
		
		// When clicking on MAIN quantity selector
		jQuery('#calculator-quantity-' + rowIndex).change(function() {
		var changedValue = jQuery(this).parent().attr('id');
		var runHere = '#' + changedValue + ' .onderdeel-container';
			// Set total to 0
			var total = 0;	
			// Get number from input
			var quantity = jQuery(this).val();
				// Couple quantity selectors to number of products selected (dependent on ACF field for linking onderdeel aantal to product aantal
				jQuery("#calculator-product-row-" + rowIndex).find(".coupled").val(quantity);
				// Restrict input maximum value to equal product aantal
				jQuery("#calculator-product-row-" + rowIndex).find('.maximum-gelijk').attr("max", quantity);
			// Onderdelen show/hide depending on number
			if (quantity == 0) {
				jQuery("#onderdelen-" + rowIndex).hide();
			} else {
				jQuery("#onderdelen-" + rowIndex).show();
				
				// Run onderdelen function
				jQuery(runHere).each(function(j) {
					var onderdeelRowIndex = j + 1; // Correct row number
					// Get each individual price
					var onderdeelUnit = jQuery('#onderdeel-prijs-' + onderdeelRowIndex).attr('unit');
					var onderdeelTotal = 0;	
					// Get number from input
					var onderdeelQuantity = jQuery('#' + changedValue + " #onderdeel-quantity-" + onderdeelRowIndex).val();
					// Initial subtotal (number x price)
					var onderdeelRowSubtotalFloatingPoint = onderdeelQuantity * onderdeelUnit;
					// Fix for floating point error
					var onderdeelRowSubtotal = onderdeelRowSubtotalFloatingPoint.toFixed(2);
					// Update html and data-attribute
					jQuery('#' + changedValue + " #onderdeel-prijs-" + onderdeelRowIndex).html(onderdeelRowSubtotal + "€").attr('onderdeelsubtotal',onderdeelRowSubtotal);
					
					// Loop through all rows again, summing onderdeel prices and adding to the div attr
					jQuery('#' + changedValue + ' .onderdeel-prijs').each(function() {
						onderdeelTotal += +jQuery(this).attr('onderdeelsubtotal');
						// Write total to product subtotal and HTML
						jQuery(this).closest('.onderdelen').attr('onderdeel-total', onderdeelTotal.toFixed(2));
					});
				});
				var onderdeelForHTML = jQuery("#onderdelen-" + rowIndex).attr('onderdeel-total');
			};
			
		// Function to follow and  update totals, inc subtotal and final total
		function keepingTotal() {
			// Update total depending on whether there are onderdelen of een vaste prijs
			if(jQuery('#calculator-unit-price-' + rowIndex).length > 0) {
				// Initial subtotal (number x price)
				var rowSubtotalFloatingPoint = quantity * unit;
				// Fix for floating point error
				var rowSubtotal = rowSubtotalFloatingPoint.toFixed(2);
				// Update html and data-attribute
				jQuery("#calculator-subtotal-row-" + rowIndex).html(rowSubtotal + "€").attr('subtotal',rowSubtotal);
			} else {
				if(onderdeelForHTML == undefined){ // Set to 0 when undefined
					jQuery("#calculator-subtotal-row-" + rowIndex).html("0€").attr('subtotal', 0);
				} else { // use variable to complete HTML and attr
					jQuery("#calculator-subtotal-row-" + rowIndex).html(onderdeelForHTML + "€").attr('subtotal',onderdeelForHTML);
				}
			};
			
			// FINAL TOTAL	
			// Loop through all rows again, adding 'subtotal' to running total
				jQuery('.calculator-subtotal-class').each(function() {
					total += +jQuery(this).attr('subtotal');
				});
			// Write total to html
			jQuery('#calculator-total span').html(total.toFixed(2));
			
			// Calculate total per month when subtotals change
				var termijnTotal = total / jQuery('#calculator-termijn-input').val();
				jQuery('#calculator-termijn span').html(termijnTotal.toFixed(2));
				
			// Calculate total per month when number of months changes
			jQuery('#calculator-termijn-input').change(function() {
				var termijnTotal = total / jQuery('#calculator-termijn-input').val();
				jQuery('#calculator-termijn span').html(termijnTotal.toFixed(2));
			});		
		};
		keepingTotal();
			
		}); // End of Change condition			
	});
	
	// Onderdelen subtotals
	jQuery('.onderdeel-container').each(function(j) {
		var onderdeelRowIndex = j + 1; // Correct row number
		// Get each indivual price
		var onderdeelUnit = jQuery('#onderdeel-prijs-' + onderdeelRowIndex).attr('unit');
		var onderdeelTotal = 0;
		
		
		jQuery('#onderdeel-quantity-' + onderdeelRowIndex).change(function() {
			console.log("Changed");
			var total = 0;
			onderdelenMaths(); // Update subtotals up to subtotal in container
			// Create variable based on attr
			var onderdeelForHTML = jQuery(this).closest(".onderdelen").attr('onderdeel-total');
			// Use variable to update subtotal in HTML & attr
			jQuery(this).closest('.calculator-product-row').find('.calculator-subtotal-class').html(onderdeelForHTML + "€").attr('subtotal',onderdeelForHTML);
			
			
			// Loop through all rows again, adding 'subtotal' to running total
				jQuery('.calculator-subtotal-class').each(function() {
					total += +jQuery(this).attr('subtotal');
				});
			// Write total to html
			jQuery('#calculator-total span').html(total.toFixed(2));
			
			// Calculate total per month when subtotals change
				var termijnTotal = total / jQuery('#calculator-termijn-input').val();
				jQuery('#calculator-termijn span').html(termijnTotal.toFixed(2));
				
			// Calculate total per month when number of months changes
			jQuery('#calculator-termijn-input').change(function() {
				var termijnTotal = total / jQuery('#calculator-termijn-input').val();
				jQuery('#calculator-termijn span').html(termijnTotal.toFixed(2));
			});		

			
		}); // End of Change condition
	}); // End each loop onderdelen
	

</script>