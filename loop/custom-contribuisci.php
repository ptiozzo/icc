<div class="row contribuisci-banner collapse <?php if($_COOKIE['contribuisci']!= 'close'){echo "show";} ?> mx-0" id="contribuisci">
  <?php
  $argsContribuisciDesktop = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> 'contribuisci-banner-desktop',
      ),
    ),
  );
  $loopContribuisciDesktop = new WP_Query( $argsContribuisciDesktop );

  if( $loopContribuisciDesktop->have_posts() ) :
    while( $loopContribuisciDesktop->have_posts() ) : $loopContribuisciDesktop->the_post();
  ?>
    <div class="col-2 mx-auto my-auto d-none d-md-block">
      <img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia_nero.png' alt='Italia che cambia' title='Italia che cambia'>
    </div>
    <div class="col-12 col-md-7 mt-2 p-2 font-weight-light d-none d-md-block">
      <?php the_content(); ?>
    </div>
    <?php
    endwhile;
  endif;


  $argsContribuisciMobile = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> 'contribuisci-banner-mobile',
      ),
    ),
  );
  $loopContribuisciMobile = new WP_Query( $argsContribuisciMobile );

  if ($loopContribuisciMobile->have_posts()):
    while( $loopContribuisciMobile->have_posts() ) : $loopContribuisciMobile->the_post();
  ?>
    <div class="col-12 col-md-7 p-2 d-md-none font-weight-light">
      <?php the_content(); ?>
    </div>
    <?php
    endwhile; ?>
    <div class="col-auto d-flex align-items-end"><a class="btn btn-dark mb-3 text-white rounded-pill" href="/contribuisci/">Contribuisci</a></div>
    <div class="col-auto ml-auto"><button class="btn btn-outline-dark my-3 rounded-pill" type="button" data-toggle="collapse" data-target="#contribuisci" aria-expanded="false" aria-controls="collapsContribuisci">X</a></div>
  <?php endif; ?>
</div>

<script>
(function($) {
  $('#contribuisci').on('hidden.bs.collapse', function () {
    var date = new Date();
    date.setTime(date.getTime()+(3*24*60*60*1000));
    document.cookie = "contribuisci=close; expires=" + date.toGMTString() + ";path=/";
  })
})(jQuery);
</script>
