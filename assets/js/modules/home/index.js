(function(){

	var $numbers = $('main.home > section.left > .box-1 > .articles-container > .articles .articles-foot .arrows .numbers')

	/** Swiper instance */
	var instance1 = new Swiper('main.home .swiper-container.instance1', {
		pagination: {
			el: '.swiper-container.instance1 .swiper-pagination',
		},
	});

	$('main.home > section.left > .box-1 > .articles-container > .articles .articles-foot .arrows figure[data-action="prev"]').on('click', function(){
		instance1.slidePrev();
	});

	$('main.home > section.left > .box-1 > .articles-container > .articles .articles-foot .arrows figure[data-action="next"]').on('click', function(){
		instance1.slideNext();
	});

	/**
	 * On Slide Change Event
	 */
	instance1.on('slideChange', function(){
		$numbers.text( (instance1.activeIndex + 1) + ' / ' + instance1.slides.length )
	})

})();

(function(){

	/** Swiper instance */
	var instance2 = new Swiper('main.home .swiper-container.map-swiper', {
		pagination: {
			el: 'main.home > section.left > .box-2 .head > .title > .arrows .page-number',
			type: 'fraction'
		},
	});


	$('main.home > section.left > .box-2 .head > .title > .arrows figure[data-action="prev"]').on('click', function(){
		instance2.slidePrev();
	});

	$('main.home > section.left > .box-2 .head > .title > .arrows figure[data-action="next"]').on('click', function(){
		instance2.slideNext();
	});

})();

(function(){

	/** Swiper instance */
	var instance3 = new Swiper('main.home .swiper-container.latest-news-swiper', {
		pagination: {
			el: 'main.home > section.right > .home-content > .box-2 > .head > .title > .arrows .page-number',
			type: 'fraction'
		},
	});


	$('main.home > section.right > .home-content > .box-2 > .head > .title > .arrows figure[data-action="prev"]').on('click', function(){
		instance3.slidePrev();
	});

	$('main.home > section.right > .home-content > .box-2 > .head > .title > .arrows figure[data-action="next"]').on('click', function(){
		instance3.slideNext();
	});

})();

(function(){

	/** Swiper instance */
	var instance4 = new Swiper('main.home .swiper-container.generic-article-swiper', {
		pagination: {
			el: 'main.home > section.right > .home-content > .box-3 > .content > .arrows .page-number',
			type: 'fraction'
		},
	});


	$('main.home > section.right > .home-content > .box-3 > .content > .arrows figure[data-action="prev"]').on('click', function(){
		instance4.slidePrev();
	});

	$('main.home > section.right > .home-content > .box-3 > .content > .arrows figure[data-action="next"]').on('click', function(){
		instance4.slideNext();
	});

})();

(function(){

	/** STICKY LATERAL BAR **/
	stickyBar( $('div.home-page > div.stiky') )

})();
