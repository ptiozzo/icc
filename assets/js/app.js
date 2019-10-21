(function($) {

  (function(){
  	/**
  	 * Open/Close Menù
  	 */
  	var
  		  $open = $('header.stripe .left-col .menu .bars')
  		, $close = $('header.overlay-menu > nav > .head > .close')
  		, $menu = $('header.overlay-menu')

  	/**
  	 * Open
  	 */
  	$open.on('click', function(){
  		$menu.addClass('show')
  	})
  	/**
  	 * Close
  	 */
  	$close.on('click', function(e){
  		e.preventDefault()
  		$menu.removeClass('show')
  	})
  })();
})(jQuery);
