(function($) {
(function(){

	var $paths = $('.sezione-mappa .map-svg svg path'),
		$contents = $('.regioni .regione'),
		$infowindow = $('.infowindow'),
		timeout;

	/**
	 * On mouse enter in una regione
	 */
	$paths.on('mouseenter', function() {

		/**
		 * Non nascondere
		 */
		clearTimeout(timeout);

		/**
		 * Mostra infowindow
		 */
		$infowindow.addClass('show');

		/**
		 * Cerca il contenuto della regione
		 */
		var $content = $contents.filter('[data-id="'+ $(this).attr('id') +'"]');

		/**
		 * Versa il contenuto HTML nel infowindow
		 */
		$infowindow.find('.content').html($content.clone().children());

	});

	/**
	 * On click delle regioni
	 */
	$paths.on('click', function(e) {
		window.location.href = 'http://www.italiachecambia.org/mappa/' + $contents.filter('[data-id=' + $(this).attr('id') + ']').attr('data-slug');
	});

	/**
	 * On mouse move in una regione
	 */
	$paths.on('mousemove', function(e) {

		var left = e.pageX - 20,
			top = e.pageY - (80 +53 + 20);

		/**
		 * Posiziona l'infowindow
		 */
		$infowindow.stop().animate({
			top: top,
			left: left
		}, 50);
	})

	/**
	 * Se esci dalla regione
	 */
	$paths.on('mouseleave', function(e) {

		/**
		 * Mostra infowindow
		 */
		timeout = setTimeout(function() {
			$infowindow.removeClass('show');
		}, 100);
	});

	/**
	 * Se clicchi fuori dalla mappa
	 */
	$('html,body').on('click', function(e) {

		for(i = 0; i < $paths.length; i++) {
			if($paths[i] == e.target) {
				return false;
			}
		};

		/**
		 * Mostra infowindow
		 */
		timeout = setTimeout(function() {
			$infowindow.removeClass('show');
		}, 100);
	});
})();
})(jQuery);
