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


(function(){

	var	
		  $headerStripe = $('header.stripe')
		, $pageHead = $('main .page-head')
		, $window = $(window)
		, $footer = $('footer')
	
	/** GESTIONE SCROLL BODY **/
	function stickyBar($element){

		var
			  
			  canAttach = function() {
		
				var 
					  headerHeight = parseFloat($headerStripe.css('height')) + ( $pageHead.length > 0 ?  parseFloat($pageHead.css('height')) : 0 )
					, totalHeight = parseFloat(headerHeight) + parseFloat($element.css('height'))
					, neededScroll = totalHeight - $window.height() - $window.scrollTop()

				return neededScroll <= 0
				
				
			}
			, canAttachFoot = function(){
				var
					  footerBounding = $footer[0].getBoundingClientRect()
					, remainingDistance = $window.height() - footerBounding['top']
	
				return remainingDistance >= 0
	
			}
		
		// ADD SCROLL LISTENER
		$window.on('scroll', function(){
			
			if( canAttach() ){
				$element.addClass('attach')
			} else {
				$element.removeClass('attach')
			}
	
			if( canAttachFoot() ){
				$element.addClass('attach-foot')
			} else {
				$element.removeClass('attach-foot')
			}
			
		})
	}

	window.stickyBar = stickyBar	
})();

(function(){

	/**** GESTONE SERCH ****/

	var
		  $openSearch = $('header.stripe .right-col .search')
		, $searchContainer = $('section.search-section')
		, $form = $searchContainer.find('form')
		, $result = $searchContainer.find('.result')
		, $closeSearch = $('section.search-section figure.close')

	
	/**
	 * Open Search Container
	 */
	function open(){
		$openSearch.addClass('open')
		$searchContainer.addClass('show')

		setTimeout(function(){
			$searchContainer.addClass('op')
		}, 100)
	}

	/**
	 * Close Search Container
	 */
	function close(){
		
		$searchContainer.removeClass('op')
		$openSearch.removeClass('open')
		
		setTimeout(function(){
			$searchContainer.removeClass('show')

			// Hide Result Search
			$result.removeClass('show')
			$result.removeClass('op')
			$form.removeClass('top')
		}, 600)
	}

	/**
	 * Show Search Result
	 */
	function showResults(){

		// Alza form
		$form.addClass('top')

		// Mostra risultati
		if( !$result.hasClass('show') ){
			$result.addClass('show')

			setTimeout(function(){
				$result.addClass('op')
			}, 600)
		}
	}

	 /**
	  * Simula Ajax
	  */
	 function onAajax(_callback){
		setTimeout(_callback, 1000)
	 }
	
	/**
	 * Apri Search sul click del pulsante
	 */
	$openSearch.on('click', function(){
		open()
	})

	/**
	 * Evento submit form
	 */
	$form.on('submit', function(e){
		e.preventDefault()


		/** AJAX EVENT.... */
		onAajax(function(){

			/**
			 * Mostra risultati in DOM
			 */
			showResults()
			
		})
	})
	
	/**
	 * Event
	 */
	$closeSearch.on('click', function(){
		close()
	})

})();