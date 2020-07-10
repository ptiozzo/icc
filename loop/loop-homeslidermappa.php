<?php

$argsMappaArchivio = array(
  'post_type' => array('mappa'),
  'posts_per_page' => 8,
);

$loopMappaArchivio = new WP_Query( $argsMappaArchivio );

if ($loopMappaArchivio->have_posts()) {


?>
  <div class='head'>
    <div class='title'>
      <h5>LA MAPPA DELL’ITALIA CHE CAMBIA</h5>
    </div>
  </div>

  <!-- carouselMappa desktop -->
  <div id="carouselMappa" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="5000">
    <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
      <a class="carousel-control-prev" href="#carouselMappa" data-no-swup role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <ol class="carousel-indicators pr-2 text-white">
        <li data-target="#carouselMappa" data-slide-to="0" class="text-white active">1</li>
        <?php
        $i = 1;
        while ($loopMappaArchivio->have_posts()) {
          $loopMappaArchivio->the_post();
          ?>
            <li data-target="#carouselMappa" data-slide-to="<?php echo $i; ?>" class="text-white"><?php echo $i+1; ?></li>
          <?php
          $i++;
        }?>
        <p class=""> /<?php echo floor($i/2)+1; ?></p>
      </ol>
      <a class="carousel-control-next" href="#carouselMappa" data-no-swup role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <article>
          <div class='left'>
            <ul class='list'>
              <li>
                <div class='info'>
                  <div class='number'><?php
                    if (get_option('icc_mappa_rete_totale')){
                      echo get_option('icc_mappa_rete_totale');
                    } else{
                      echo "0";
                    } ?></div>
                  <div class='text'> RETI</div>
                </div>
                <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
              </li>
              <li>
                <div class='info d-flex flex-column flex-md-row'>
                  <div class='number'><?php
                    if (get_option('icc_mappa_realta_totale')){
                      echo get_option('icc_mappa_realta_totale');
                    } else{
                      echo "0";
                    } ?></div>
                  <div class='text'> REALTÀ</div>
                </div>
              </li>
              <li>
                <a class='cta' href='<?php echo home_url(); ?>/mappa/' target='_blank'>VAI ALLA MAPPA</a>
              </li>
            </ul>
          </div>
          <div class='right'>
            <figure>
              <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/italy-map.svg' alt='' title=''>
            </figure>
          </div>
        </article>
      </div>

      <?php
        $i = 0;
        while ($loopMappaArchivio->have_posts()) {
          $loopMappaArchivio->the_post();

          if ($i%2 == 0){ ?>
            <div class="carousel-item">
          <?php
          }
          ?>
            <article class="border-0 relta__mappata p-0 <?php if ($i%2 == 0) {echo "mb-7px";}?>">
              <img src="<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url();} else {echo "https://via.placeholder.com/535x170?text=Mappa+Italia+Che+Cambia";} ?>" class="img-fluid p-0" alt="<?php echo get_the_title(); ?>">
              <div class="relta__mappata__detail text-white">
                <h5 class="relta__mappata_regione">
                  <?php
                  $term1 = "mapparegione";
                  $terms = get_the_terms( $post->ID , $term1 );
                  if ($terms != ""){
                    foreach ( $terms as $term ) {
                      echo $term->name ." ";
                    }
                  } ?>
                </h5>
                <h5 class="relta__mappata_nome font-weight-bold"><?php echo get_the_title(); ?></h5>
              </div>
              <a href="<?php echo get_the_permalink();?>" class="stretched-link"></a>
            </article>
            <?php if ($i%2 == 1){ ?>
              </div>
            <?php }
            $i++;
            if ($i >= 8){
              break;
            }
          };?>

      <?php if ($i%2 == 1){ ?>
        </div>
      <?php } ?>

    </div>
  </div>
<?php
}
?>
