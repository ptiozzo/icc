<?php

function bachecaSlider($regione = '_tutteleregioni'){

  if($regione != "_tutteleregioni"){
    $filtroRegione = array('relation' => 'OR',
                      array(
                          'taxonomy' => 'regione',
                          'field'    => 'slug',
                          'terms'    => $regione,
                      ),
                      array(
                          'taxonomy' => 'regione',
                          'field'    => 'slug',
                          'terms'    => 'aanazionale',
                      ),
                    );
  } else {
    $filtroRegione = '';
  }

  $argsBacheca = array(
      'post_type' => array('cerco-offro'),
      'posts_per_page' => 10,
      'tax_query' => array(
          'relation' => 'AND',
          $filtroRegione,
          array(
            'taxonomy' => 'cercooffro',
            'field'    => 'slug',
            'terms'    => 'risolto',
            'operator' => 'NOT IN',
          ),
        ),
      );
  $loopBacheca = new WP_Query( $argsBacheca );
  $i = 0;
  if($loopBacheca->have_posts()){
    ?>
    <div class="sliderBacheca mb-2">

      <div class='head p-0'>
        <div class='title'>
          <h5>BACHECA CERCO/OFFRO</h5>
        </div>
      </div>

      <div id="carouselLeBacheca" class="carousel carousel-control-top slide p-1" data-ride="carousel" data-interval="false">
        <?php if($loopBacheca->post_count > 2){ ?>
          <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
            <a class="carousel-control-prev" href="#carouselLeBacheca" data-no-swup role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <ol class="carousel-indicators pr-2 text-white">
               <?php for ($count = 0;$count < $loopBacheca->post_count; $count++){ ?>
                       <li data-target="#carouselLeBacheca" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
              <?php }	?>
              <p class=""> /<?php echo ceil($count/2);?></p>
            </ol>
            <a class="carousel-control-next" href="#carouselLeBacheca" data-no-swup role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        <?php } ?>
        <div class="carousel-inner">
          <?php

          /* Loop post Live */
          while( $loopBacheca->have_posts() ) : $loopBacheca->the_post();
          $i++;
          if ($i % 2 == 1){ ?>
            <div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
              <div class="card-group">
          <?php
          }
            $tipologia = get_the_terms( get_the_ID() , 'cercooffro' )[0]->slug;
            if ( has_post_thumbnail() ) {
              $image = get_the_post_thumbnail_url(get_the_ID(),'icc_ultimenewshome');
            }elseif ($tipologia == "cerco") {
              $image = get_template_directory_uri().'/plugin/bacheca/asset/img/Cerco.png';
            }elseif ($tipologia == "offro") {
              $image = get_template_directory_uri().'/plugin/bacheca/asset/img/Offro.png';
            }elseif ($tipologia == "Risolto") {
              $image = get_template_directory_uri().'/plugin/bacheca/asset/img/Risolto.png';
            } else {
              $image = catch_that_image();
            }
            ?>

              <div class="card col-6 h-100 text-break">
                <img src="<?php echo $image;?>" class="card-img-top p-0" alt="<?php the_title(); ?>">
                <div class="card-body p-1">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <p class="card-text"><?php echo get_the_excerpt();?></p>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leggi di più</a>
                </div><!-- .card-body -->
              </div><!-- .card -->

            <?php
            if ($i % 2 == 0){ ?>
            </div><!-- .card-group -->
              </div><!-- .carousel-item -->
            <?php
            }
          endwhile;
          if ($i % 2 == 1){ ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div><!-- Fine slider Bacheca -->
    <?php

  }

}
wp_reset_postdata();
?>
