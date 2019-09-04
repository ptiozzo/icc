<div class="clearfix"></div>

	<footer class="footer">
		<div class="footer__content">
			<div class="footer__logo">Immagine footer</div>
			<div class="footer__ragionesociale">
				ITALIA CHE CAMBIA</br>
				Associazione di promozione sociale</br>
				Via Aldo Banzi, 88 - 00128 Roma (RM)</br>
				CF: 97761390588 P.IVA: 12511651007
			</div>
			<?php
				wp_nav_menu( array('theme_location' => 'menu-social'));
				wp_nav_menu( array('theme_location' => 'menu-footer'));
			?>
		</div> <!-- .footer__content -->
	</footer>
	<?php wp_footer();?>
</div> <!-- container -->
</body>
</html>
