<!-- Post correlati -->
  <?php

  $filtroRete =  array(
    'taxonomy' => 'mapparete',
    'field'    => 'slug',
    'terms'    => $Rete1,
  );
    $argsMappaCorrelati = array(
      'post_type' => array('mappa'),
      'ignore_sticky_posts' => 1,
      'orderby' => 'modified',
      'posts_per_page' => -1,
      'tax_query' => array(
          'relation' => 'AND',
          $filtroRete,
        ),
    );
    $loopMappaCorrelati = new WP_Query($argsMappaCorrelati);
    if ( $loopMappaCorrelati->have_posts() ) {
        echo '<div class="col-12 mappa_correlati p-2">';
        echo '<div class="row">';
        if($Rete1 != "sostenibilmente"){
          echo '<div class="col-12"><h4>I nodi della rete</h4></div>';
        } else{
          echo '<div class="col-12"><h4>Le realtà mappate</h4></div>';
        }

        while ( $loopMappaCorrelati->have_posts() ) {
            $loopMappaCorrelati->the_post();
            ?>

                <div class="card col-12 col-md-4 border-0 mt-2">
                  <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('icc_ultimenewshome', array('class' => 'card-img-top p-0','alt' => get_the_title()));
                    }elseif (has_post_thumbnail(get_page_by_title(get_the_terms($post->ID,'mapparete')[0]->name,'','mappa')->ID)){
                      echo '<img class="card-img-top p-0" src="'.get_the_post_thumbnail_url(get_page_by_title(get_the_terms($post->ID,'mapparete')[0]->name,'','mappa')->ID).'" />';
                    }else{
                      echo '<img class="card-img-top p-0" src="'.get_template_directory_uri().'/plugin/mappa/asset/mappa-icc.png" />';
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
