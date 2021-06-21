
  <div class="col-12">
    <?php
    $argsFerie = array(
      'post_type' => 'contenuti-speciali',
      'posts_per_page' => 1,
      'tax_query' => array(
        array(
            'taxonomy'=> 'contenuti_speciali_filtri',
            'field'   => 'slug',
            'terms'		=> 'ferie',
        ),
      ),
    );
    $loopFerie = new WP_Query( $argsFerie );
    if($loopFerie->have_posts()){
      ?>
      <div class="alert alert-danger mt-2" role="alert">
        <?php while( $loopFerie->have_posts() ) : $loopFerie->the_post();
          the_content();
        endwhile; ?>
      </div>

    <?php }
    wp_reset_postdata(); ?>

  </div>
