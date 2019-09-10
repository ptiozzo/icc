(function(){
	
	/** Swiper instance */
	var instance1 = new Swiper('main.salute-che-cambia .swiper-container.instance1');


	$('main.salute-che-cambia .swiper-container.instance1').on('click', 'figure[data-action="prev"]', function(){
		instance1.slidePrev();
	});

	$('main.salute-che-cambia .swiper-container.instance1').on('click', 'figure[data-action="next"]', function(){
		instance1.slideNext();
	});

})();

(function(){
	
	/** Swiper instance */
	var instance2 = new Swiper('main.salute-che-cambia .swiper-container.interview-swiper', {
		pagination: {
			el: 'main.salute-che-cambia > section.left > .box-2 > .head > .title > .arrows .page-number',
			type: 'fraction'
		},
	});


	$('main.salute-che-cambia > section.left > .box-2 > .head > .title > .arrows figure[data-action="prev"]').on('click', function(){
		instance2.slidePrev();
	});

	$('main.salute-che-cambia > section.left > .box-2 > .head > .title > .arrows figure[data-action="next"]').on('click', function(){
		instance2.slideNext();
	});

})();

(function(){

	/** STICKY LATERAL BAR **/
	stickyBar( $('main.salute-che-cambia > .page-content > section.left > .content-container') )
	
})();