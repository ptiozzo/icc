/**
 * Gestione della lista con sort
 */
(function() {
	
	function makeSelect($sorter){

		var
	
			/**
			 * Sorter per data
			 */
			// $sorter = $('main.contenuti > .head > .selects > .select-container'),
	
			/**
			 * Box delle opzioni
			 */
			$optionsContainer = $sorter.find('.options'),
	
			/**
			 * opzioni del sorter
			 */
			$options = $optionsContainer.find('.option'),
	
			/**
			 * Filtro sort attivo
			 */
			$active = $options.filter('.active'),
	
			/**
			 * Testo placeholder della select
			 */
			$text = $sorter.find('.title h5'),
			defaultText = $text.html(),
	
			/**
			 * Valore
			 */
			selectValue,

			/**
			 * Change callbacks
			 */
			onChange = []

	
	
		/**
		 * Apri/Chiudi opzioni del sorter
		 */
		$sorter.on('click', '.title', function() {
	
			/**
			 * Metti la class open (cosi sappiamo se dobbiamo aprirlo)
			 */
			$optionsContainer.toggleClass('open');
	
		});
	
		/**
		 * Click di una opzione del sorter
		 */
		$options.on('click', function(event) {
			/**
			 * Prendiamo il testo dell'opzione 
			 */
			var text = $(this).html();
	
			/**
			 * Lo mettiamo nella casella del selezionato
			 */
			$text.html(text);
	
			/**
			 * Settiamo l'ordine
			 */
			selectValue = $(this).attr('data-value');
	
			/**
			 * Chiudi select
			 */
			$optionsContainer.removeClass('open')

			/**
			 * Call callbacks
			 */
			onChange.forEach(function(_callback){
				if(typeof _callback == 'function') {
					_callback(selectValue)
				}
			})
		});
	
		/**
		 * Se un filtro è selezionato
		 */
		$active.click();

		return {
			onChange: function(_callback){
				if(typeof _callback == 'function') {
					onChange.push(_callback)
				}
			},
			reset: function(){

				// Risetta valore
				selectValue = null

				// Rimetti testo di default
				$text.html(defaultText)

			}
		}
	}


	/**
	 * Crea istanze Select
	 */
	$('main.contenuti > .head > .selects > .select-container').each(function() {
		var selectInstance = makeSelect($(this))

		// Change event
		selectInstance.onChange(function(newVal){
			if(newVal == 'cat-1' || newVal == 'cat-2'){
				location.href = 'contenuti-categoria.php'
			}

		})

		// For reset...
		// selectInstance.reset()
	})

})();