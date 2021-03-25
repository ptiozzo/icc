(function($) {

  (function(){

    $(".menu-item-has-children").on('click', function (e){
      $(this).siblings().removeClass('show');
      $(this).siblings().find('.menu-item-has-children').removeClass('show');
      e.stopPropagation();
      $(this).toggleClass('show');
    });


  })();

  var specifiedElement = document.getElementById('navbarHome');
  document.addEventListener('click', function(event) {
    var isClickInside = specifiedElement.contains(event.target);
    if (!isClickInside) {
      $(".menu-item-has-children").removeClass('show')
    }
  });

  $(".mappa_reset").click(function() {
    document.cookie="PHPSESSID='';path='/'";
  });



})(jQuery);
