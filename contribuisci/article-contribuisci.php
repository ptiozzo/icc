<div class="single__contribuisci mb-2 position-relative">
  <?php
  $argsContribuisciSingleDesktop = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> 'contribuisci-singolo-articolo-desktop',
      ),
    ),
  );
  $loopContribuisciSingleDesktop = new WP_Query( $argsContribuisciSingleDesktop );

  $argsContribuisciSingleMobile = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> 'contribuisci-singolo-articolo-mobile',
      ),
    ),
  );
  $loopContribuisciSingleMobile = new WP_Query( $argsContribuisciSingleMobile );

  if( $loopContribuisciSingleDesktop->have_posts() || $loopContribuisciSingleMobile->have_posts()):
    while( $loopContribuisciSingleDesktop->have_posts() ) : $loopContribuisciSingleDesktop->the_post();
    ?>
    <div class="m-2 d-none d-md-block">
    <?php the_content(); ?>
    </div>
    <?php
    endwhile;
    while( $loopContribuisciSingleMobile->have_posts() ) : $loopContribuisciSingleMobile->the_post();
    ?>
    <div class="m-2 d-block d-md-none">
    <?php the_content(); ?>
    </div>
    <?php
    endwhile;
  endif;
  ?>
  <button type="button" class="btn btn-lg btn-block btn-warning position-relative">
    <b>Contribuisci adesso all'Italia che Cambia</b>
    <img src='<?php echo get_template_directory_uri();?>/assets/img/payment-methods.png' class="ml-2">
    <a href="/contribuisci" class="stretched-link"></a>
  </button>

</div>
