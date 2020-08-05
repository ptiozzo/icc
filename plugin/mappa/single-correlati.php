<!-- Post correlati -->
  <?php
    $argsMappaCorrelati = array(
      'post_type' => array('post'),
      'ignore_sticky_posts' => 1,
      'posts_per_page' => 3,
      'meta_query' => array(
          array(
              'key' => 'Mappa_Nome_Ralta',
              'value'    => get_the_title(),
              'compare'    => 'LIKE',
          ),
      ),
    );
    $loopMappaCorrelati = new WP_Query($argsMappaCorrelati);
    if ( $loopMappaCorrelati->have_posts() ) {
        echo '<div class="col-12 mappa_correlati p-2">';
        echo '<div class="row">';
        echo '<div class="col-12"><h4>Articoli che parlano di questa realtà</h4></div>';
        while ( $loopMappaCorrelati->have_posts() ) {
            $loopMappaCorrelati->the_post();
            ?>

                <div class="card col-12 col-md-4 border-0 mt-2 mt-md-0">
                  <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('icc_ultimenewshome', array('class' => 'card-img-top p-0','alt' => get_the_title()));
                    }else{
                      echo '<img class="card-img-top p-0" src="'.catch_that_image().'" />';
                    }
                  ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                    <p class="card-text"><?php //the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="stretched-link">Approfondisci</a>
                  </div>
                </div>

            <?php
        }
        echo '</div>';
        echo '</div>';
    }

    wp_reset_postdata();
  ?>
