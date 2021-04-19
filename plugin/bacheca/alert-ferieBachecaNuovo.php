
  <div class="col-12">
    <?php
    $argsBachecaFerie = array(
      'post_type' => 'contenuti-speciali',
      'posts_per_page' => 1,
      'tax_query' => array(
        array(
            'taxonomy'=> 'contenuti_speciali_filtri',
            'field'   => 'slug',
            'terms'		=> 'bacheca-ferie-nuovo',
        ),
      ),
    );
    $loopBachecaFerie = new WP_Query( $argsBachecaFerie );
    if($loopBachecaFerie->have_posts()){
      ?>
      <div class="alert alert-danger mt-2" role="alert">
        <?php while( $loopBachecaFerie->have_posts() ) : $loopBachecaFerie->the_post();
          the_content();
        endwhile; ?>
      </div>

    <?php } ?>
  </div>
