<?php $argsContribuisciPopup = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'contribuisci-popup',
    ),
  ),
);
$loopContribuisciPopup = new WP_Query( $argsContribuisciPopup );
if($loopContribuisciPopup->have_posts()){
  while( $loopContribuisciPopup->have_posts() ){
    $loopContribuisciPopup->the_post();
    ?>
    <div class="modal fade" id="contribuisciPopUp" tabindex="-1" role="dialog" aria-labelledby="contribuisciPopUp" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header d-none">
            <h5 class="modal-title" id="contribuisciPopUpTitle">Contribuisci</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <?php the_content(); ?>
          </div>
          <div class="modal-footer d-none">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      jQuery(function($){

        cookie = getCookie('contribuisciPopUp');

        if(cookie != 'close'){
          setTimeout(function(){
            $('#contribuisciPopUp').modal('show')
          }, 1 * 1000);
        } else{
          console.log('Cookie presente');
        }


        $('#contribuisciPopUp').on('hide.bs.modal', function () {
          var date = new Date();
          //date.setTime(date.getTime()+(3*24*60*60*1000));
          date.setTime(date.getTime()+(3*60*1000));
          document.cookie = "contribuisciPopUp=close; expires=" + date.toGMTString() + ";path=/";
        });

        function getCookie(name) {
        var cookieArr = document.cookie.split(";");
        for(var i = 0; i < cookieArr.length; i++) {
            var cookiePair = cookieArr[i].split("=");
            if(name == cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
          }
          return null;
        }

      });

    </script>
    <?php
  }
}
wp_reset_postdata();  ?>
