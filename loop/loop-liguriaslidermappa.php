
<?php
$filtroUtente = array(
  'taxonomy'=> 'mappastato',
  'field'    => 'slug',
  'terms'    => 'utente',
  'operator' => 'NOT IN',
);
$filtroLatLong = array(
  'key' => 'Mappa_Latitudine',
  'compare'    => 'EXISTS',
);
$filtroRegione = array(
  'taxonomy' => 'mapparegione',
  'field'    => 'slug',
  'terms'    => 'liguria',
);

$argsMappaPiemonteSlider = array(
  'post_type' => array('mappa'),
  'posts_per_page' => 8,
  'orderby' => 'modified',
  'tax_query' => array(
      'relation' => 'AND',
      $filtroRegione,
      $filtroUtente,
    ),
  'meta_query' => array(
      $filtroLatLong,
    )
);

$loopMappaLiguriaSlider = new WP_Query( $argsMappaPiemonteSlider );

if ($loopMappaLiguriaSlider->have_posts()) {
  $loopMappaLiguriaSlider->the_post();


  ?>

  <div class='head'>
    <div class='title'>
      <h5>LA MAPPA DEL PIEMONTE CHE CAMBIA</h5>
    </div>
  </div>

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
        while ($loopMappaLiguriaSlider->have_posts()) {
          $loopMappaLiguriaSlider->the_post();
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
        <article class="p-0">
            <figure>
              <a href="<?php echo home_url(); ?>/liguria/mappa/"><img class="img-fluid minatura-liguria" src='<?php echo get_template_directory_uri();?>/assets/img/modules/liguria/liguria-2.png' alt='' title=''></a>
            </figure>
        </article>
      </div>


      <?php
      $i=0;
      while ($loopMappaLiguriaSlider->have_posts()) {
        $loopMappaLiguriaSlider->the_post();

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
        <?php } ?>
        <?php $i++;
        if ($i >= 8){
          break;
        }

      }?>

      <?php if ($i%2 == 1){ ?>
        </div>
      <?php } ?>

    </div>
  </div>
<?php
}
?>
