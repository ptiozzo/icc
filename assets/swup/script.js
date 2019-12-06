(function ($) {

  /* swup */
  const options = {
    animateHistoryBrowsing: false,
    animationSelector: '[class*="transition-"]',
    containers: ["#swup"],
    cache: true,
    linkSelector:
      'a[href^="' +
      window.location.origin +
      '"]:not([data-no-swup]), a[href^="/"]:not([data-no-swup]), a[href^="#"]:not([data-no-swup])',
    skipPopStateHandling: function(event) {
      if (event.state && event.state.source == "swup") {
        return false;
      }
      return true;
      }
    };

  const swup = new Swup(options);

}(jQuery));
