<div class="clearfix"></div>

	<footer class="footer">
		<div class="footer-content">
			<div class="img-footer">Immagine footer</div>
			<div class="rag-soc-footer">Ragione sociale footer</div>
			<?php
				wp_nav_menu( array('theme_location' => 'menu-social'));
				wp_nav_menu( array('theme_location' => 'menu-footer'));
			?>
		</div> <!-- .footer-content -->	
	</footer>
	<?php wp_footer();?>
</div> <!-- container -->
</body>
</html>
