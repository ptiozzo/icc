(function ($) {

  /* swup */
  const options = {
    animateHistoryBrowsing: false,
    animationSelector: '[class*="swuptransition-"]',
    containers: ["#swup"],
    plugins: [new SwupScrollPlugin(),
              new SwupGaPlugin(),
      ],
    cache: false,
    linkSelector:
      'a[href^="' +
      window.location.origin +
      '"]:not([data-no-swup]):not([rel="data-no-swup"]), a[href^="/"]:not([data-no-swup]), a[href^="#"]:not([data-no-swup])',
    skipPopStateHandling: function(event) {
      if (event.state && event.state.source == "swup") {
        return false;
      }
      return true;
      }
    };

    new SwupScrollPlugin({
      doScrollingRightAway: false,
      animateScroll: true,
      scrollFriction: 0.3,
      scrollAcceleration: 0.02,
    });

  const swup = new Swup(options);


  function unload() {
      $('header.overlay-menu').removeClass('show')
  }
  swup.on('willReplaceContent', unload);

  function init() {
    var sidebar = new StickySidebar('#sidebar', {
        containerSelector: '.row',
        innerWrapperSelector: '.sidebar__inner',
        topSpacing: 80,
        leftSpacing: 15,
        bottomSpacing: 20
    });

  }
  swup.on('contentReplaced', init);




}(jQuery));
