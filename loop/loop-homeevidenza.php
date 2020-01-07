<?php
$argsRassegna = array(
'post_type' => 'rassegna-stampa',
'posts_per_page' => 1,
'tax_query' => array(
  array(
      'taxonomy'=> 'icc_altri_filtri',
      'field'   => 'slug',
      'terms'		=> 'RassegnaSticky',
  ),
),
);
$loopRassegna = new WP_Query( $argsRassegna );
if(!$loopRassegna->have_posts()){
  $argsRassegna = array(
  'post_type' => 'rassegna-stampa',
  'posts_per_page' => 1,
  'date_query' => array(
     array(
       'after' => '6 hours ago',
     )
    )
  );
  $loopRassegna = new WP_Query( $argsRassegna );
}
$argsSticky = array(
    'post__in' => array_diff(get_option( 'sticky_posts' ),$exclude_posts),
    'ignore_sticky_posts' => 1,
    'posts_per_page' => 10,
    'tax_query' => array(
      array(
          'taxonomy'=> 'icc_altri_filtri',
          'field'   => 'slug',
          'terms'		=> 'InHome',
      ),
    ),
);
$loopSticky = new WP_Query( $argsSticky );
$i = 0;
$icc_ArticNumber = $loopRassegna->found_posts+$loopSticky->found_posts;
if( $loopRassegna->have_posts() || $loopSticky->have_posts() ) : ?>
  <div class='head'>
    <div class='title'>
      <h5>IN EVIDENZA</h5>
    </div>
  </div>
  <div id="carouselRassegnaEvidenza" class="carousel carousel-control-top slide <?php if ($icc_ArticNumber > 1){echo "controll-visible";} ?>" data-ride="carousel" data-interval="5000">
    <?php if ($icc_ArticNumber > 1) { ?>
      <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
        <a class="carousel-control-prev" href="#carouselRassegnaEvidenza" data-no-swup role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <ol class="carousel-indicators pr-2 text-white">
           <?php for ($count = 0;$count <= $icc_ArticNumber; $count++){ ?>
                   <li data-target="#carouselRassegnaEvidenza" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
          <?php }	?>
          <p class=""> /<?php echo $icc_ArticNumber;?></p>
        </ol>
        <a class="carousel-control-next" href="#carouselRassegnaEvidenza" data-no-swup role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <?php } ?>
    <div class="carousel-inner">
      <!-- Rassegna stampa -->
  <?php	while( $loopRassegna->have_posts() ) : $loopRassegna->the_post();
    $i++; ?>
    <div class="carousel-item <?php if ($i == 1){echo "active";} ?>">
      <article id="post-<?php the_ID(); ?>" class="p-0">
        <div class='content rassegna-stampa p-0'>
          <a href='<?php echo the_permalink();?>'>
              <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
              }
              else{
                echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
              }
              ?>
            <article>
              <div class='date'>
                <?php the_time('j M Y') ?>
              </div>
              <h5><?php the_title(); ?></h5>
              <div class='info'>A cura di <b><?php echo get_the_author();?></b></div>
            </article>
          </a>
        </div>
      </article>
    </div>
    <?php
    $exclude_posts[] = $post->ID;
    endwhile;?>
    <!-- Post in evidenza con flag InHome -->
    <?php while( $loopSticky->have_posts() ) : $loopSticky->the_post();
    $i++?>
      <div class="carousel-item <?php if ($i == 1){echo "active";} ?>">
        <article id="post-<?php the_ID(); ?>" class="p-0">
          <div class='content rassegna-stampa p-0'>
            <a href='<?php echo the_permalink();?>'>
                <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
                }
                else{
                  echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
                }
                ?>
              <article>
                <div class='date'>
                  <?php the_time('j M Y') ?>
                </div>
                <h5><?php the_title(); ?></h5>
                <div class='info'>A cura di <b><?php echo get_the_author();?></b></div>
              </article>
            </a>
          </div>
        </article>
      </div>
      <?php
      $exclude_posts[] = $post->ID;
      endwhile;
      ?>
  </div>
</div>
<?php
endif;
wp_reset_query();?>
