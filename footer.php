</div><!-- container -->
<div class="site-footer">
<!-- Example widget area -->
	<div id="footer-sidebar" class="secondary">
		<div id="footer-sidebar1" class="widgetspace">
		<?php
		if(is_active_sidebar('footer-sidebar-1')){
		dynamic_sidebar('footer-sidebar-1');
		}
		?>
		</div>
		
		<div id="footer-sidebar2" class="widgetspace">
		<?php
		if(is_active_sidebar('footer-sidebar-2')){
		dynamic_sidebar('footer-sidebar-2');
		}
		?>
		</div>
		
		<div id="footer-sidebar3" class="widgetspace">
		<?php
		if(is_active_sidebar('footer-sidebar-3')){
		dynamic_sidebar('footer-sidebar-3');
		}
		?>
		</div>
	</div>
<!-- Example Widget Area END -->

	<div class="copyright">
		&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>
	</div>
</div>



<?php wp_footer(); ?>
	
</body>
</html>