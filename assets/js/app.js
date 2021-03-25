(function($) {

  (function(){

    $(".menu-item-has-children").click(function(e){
        $(this).toggleClass("show")
    })

  })();

  $(".mappa_reset").click(function() {
    document.cookie="PHPSESSID='';path='/'";
  });



})(jQuery);
