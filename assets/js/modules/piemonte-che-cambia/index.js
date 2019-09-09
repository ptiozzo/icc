(function(){
	
	/** Swiper instance */
	var instance1 = new Swiper('main.piemonte-che-cambia .swiper-container.instance1');


	$('main.piemonte-che-cambia .swiper-container.instance1').on('click', 'figure[data-action="prev"]', function(){
		instance1.slidePrev();
	});

	$('main.piemonte-che-cambia .swiper-container.instance1').on('click', 'figure[data-action="next"]', function(){
		instance1.slideNext();
	});
	
})();

(function(){

	/** STICKY LATERAL BAR **/
	stickyBar( $('main.piemonte-che-cambia > .page-content > section.left > .content-container') )
	
})();