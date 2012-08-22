	</div><!-- #main -->
	
	<?php arras_before_footer() ?>
    
    <div id="footer">
		<div class="footer-sidebar-container clearfix">
			<?php 
				$footer_sidebars = arras_get_option('footer_sidebars');
				if ($footer_sidebars == '') $footer_sidebars = 1;
				
				for ($i = 1; $i < $footer_sidebars + 1; $i++) : 
			?>
				<ul id="footer-sidebar-<?php echo $i ?>" class="footer-sidebar clearfix xoxo">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar #' . $i) ) : ?>
					<li></li>
					<?php endif; ?>
				</ul>
			<?php endfor; ?>
		</div>
		
		<div class="footer-message">
		<p class="floatright"><a class="arras" href="#"><strong><?php _e('', 'arras') ?></strong></a></p>
		<?php echo stripslashes(arras_get_option('footer_message')); ?>		
		</div><!-- .footer-message -->
    </div>
</div><!-- #wrapper -->
<?php 
arras_footer();
wp_footer(); 
?>
<!-- Chatty Loader Code --> 
<!--script id="chatty_loader_script" type="text/javascript" language="javascript" src="http://app.chattybar.com/chatty-loader.js?room_id=23&site_id=23"></script-->
<!-- End Chatty Loader Code -->

</body>
</html>
   
