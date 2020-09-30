<?php
/* Query per ICC-TV sticky
*---------------------*/
$argsICCTVSticky = array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'category_name' => 'icc-tv',
  'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy'=> 'icc_altri_filtri',
        'field'   => 'slug',
        'terms'		=> 'InHome',
    ),
    array(
        'taxonomy'=> 'icc_altri_filtri',
        'field'   => 'slug',
        'terms'		=> 'icctvsticky',
    ),
  ),
);
$loopICCTVSticky = new WP_Query( $argsICCTVSticky );

/* Query per ICC-TV
*---------------------*/

if(10-$loopICCTVSticky->post_count != 0){
  $argsICCTV = array(
    'post_type' => 'post',
    'posts_per_page' => 10-$loopICCTVSticky->post_count,
    'category_name' => 'icc-tv',
    'tax_query' => array(
      'relation' => 'AND',
      array(
          'taxonomy'=> 'icc_altri_filtri',
          'field'   => 'slug',
          'terms'		=> 'InHome',
      ),
      array(
          'taxonomy'=> 'icc_altri_filtri',
          'field'   => 'slug',
          'terms'		=> 'icctvsticky',
          'operator' => 'NOT IN',
      ),
    ),
  );
  $loopICCTV = new WP_Query( $argsICCTV );
} else{
  $loopICCTV = new WP_Query( false );
}

$i = 0;


if( $loopICCTV->have_posts() || $loopICCTVSticky->have_posts() ) : ?>
  <div class='head'>
    <div class='title'>
      <h5>APPROFONDIMENTI - ICC TV</h5>
    </div>
  </div>
  <div id="carouselLeNostreStorie" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
    <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
      <a class="carousel-control-prev" href="#carouselLeNostreStorie" data-no-swup role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <ol class="carousel-indicators pr-2 text-white">
         <?php for ($count = 0;$count <= 10; $count++){ ?>
                 <li data-target="#carouselLeNostreStorie" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
        <?php }	?>
        <p class=""> /<?php echo '5';?></p>
      </ol>
      <a class="carousel-control-next" href="#carouselLeNostreStorie" data-no-swup role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="carousel-inner">
    <?php
    /* Loop post stick */
    while( $loopICCTVSticky->have_posts() ) : $loopICCTVSticky->the_post();
    $i++;
    if ($i % 2 == 1){ ?>
      <div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
        <div class="card-group">
    <?php
    }
    ?>

      <div class="card border-0 p-1">
        <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
        }
        else{
          echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
        }
        ?>
        <div class="card-body p-1">
          <h5 class="card-title"><?php the_title(); ?></h5>
          <a href="<?php echo the_permalink();?>" class="stretched-link"></a>
        </div>
      </div>
      <?php
      if ($i % 2 == 0){ ?>
          </div>
        </div>
      <?php
      }
      ?>

    <?php
    $exclude_posts[] = $post->ID;
    endwhile;

  /* Loop post  */
    while( $loopICCTV->have_posts() ) : $loopICCTV->the_post();
    $i++;
    if ($i % 2 == 1){ ?>
      <div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
        <div class="card-group">
    <?php
    }
    ?>

      <div class="card border-0 p-1">
        <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
        }
        else{
          echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
        }
        ?>
        <div class="card-body p-1">
          <h5 class="card-title"><?php the_title(); ?></h5>
          <a href="<?php echo the_permalink();?>" class="stretched-link"></a>
        </div>
      </div>
      <?php
      if ($i % 2 == 0){ ?>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      $exclude_posts[] = $post->ID;
      endwhile;
    if ($i % 2 == 1){ ?>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
<?php
else:
  echo "<p>Non ho trovato nessun Le storie</p>";
endif;
wp_reset_query();?>
