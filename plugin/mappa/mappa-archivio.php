<?php
$filtro = 0;
if($Categoria1 != 'tuttelecategorie'){
  $filtro = 1;
  $filtroCategoria = array(
    'taxonomy' => 'mappacategoria',
    'field'    => 'slug',
    'terms'    => $Categoria1,
  );
} else{
  $filtroCategoria = '';
}
if($Rete1 != 'tuttelereti'){
  $filtro = 1;
  $filtroRete =  array(
    'taxonomy' => 'mapparete',
    'field'    => 'slug',
    'terms'    => $Rete1,
  );
} else{
  $filtroRete = '';
}
if ($Provincia1 != 'tutteleprovince'){
  $filtro = 1;
  $filtroRegione = array(
    'taxonomy' => 'mapparegione',
    'field'    => 'slug',
    'terms'    => $Provincia1,
  );
} elseif ($Regione1 != 'tutteleregioni'){
  $filtro = 1;
  $filtroRegione = array(
    'taxonomy' => 'mapparegione',
    'field'    => 'slug',
    'terms'    => $Regione1,
  );
}else{
  $filtroRegione = '';
}
if ($Tipologia1 != 'tutteletipologie') {
  $filtro = 1;
  $filtroTipologia = array(
    'taxonomy' => 'mappatipologia',
    'field'    => 'slug',
    'terms'    => $Tipologia1,
  );
}else{
  $filtroTipologia = '';
}
if($Realta1 != $Realta ){
  $filtro = 1;
}

$filtroLatLong = array(
  'key' => 'Mappa_Latitudine',
  'compare'    => 'EXISTS',
);
$realtaSegnalate = 0;
if(!is_user_logged_in() || $Regione == "tutteleregioni"){
  $filtroUtente = array(
    'taxonomy'=> 'mappastato',
    'field'    => 'slug',
    'terms'    => 'utente',
    'operator' => 'NOT IN',
  );
}else{
  $filtroUtente = "";
  $realtaSegnalate = 1;
}


$argsMappaArchivio = array(
  'post_type' => array('mappa'),
  'posts_per_page' => -1,
  'orderby' => 'name',
  'order' => 'ASC',
  's' => $Realta1,
  'tax_query' => array(
      'relation' => 'AND',
      $filtroCategoria,
      $filtroRete,
      $filtroRegione,
      $filtroTipologia,
      $filtroUtente,
    ),
  'meta_query' => array(
      $filtroLatLong,
    )
);
$loopMappaArchivio = new WP_Query( $argsMappaArchivio );
if($loopMappaArchivio->have_posts()){
  ?>
  <div class='head'>
    <div class='title'>
      <h5>TUTTE LE REALTA' FILTRATE</h5>
    </div>
  </div>
  <div class="row filtri_mappa">
      <?php
        while ($loopMappaArchivio->have_posts()) {
          $loopMappaArchivio->the_post();
          ?>
          <div class="col-12 col-md-3 mb-2">
            <div class="card card--mappa h-100">
              <img src="<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url();} else {echo get_template_directory_uri().'/plugin/mappa/asset/mappa-icc.png';} ?>" class="card-img-top p-0" alt="<?php echo get_the_title(); ?>">
              <div class="card-body pt-0">
                <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                <a href="<?php the_permalink() ?>" class="stretched-link">Approfondisci</a>
              </div>
            </div>
          </div>
          <?php
        }
      ?>
  </div>
  <form class="text-center mt-3" action="<?php echo get_pagenum_link(); ?>" method="post">
    <input type="hidden" name="categoria-dropdown" value="<?php echo $Categoria1; ?>">
    <input type="hidden" name="rete-dropdown" value="<?php echo $Rete1; ?>">
    <input type="hidden" name="regione-dropdown" value="<?php echo $Regione1; ?>">
    <input type="hidden" name="provincia-dropdown" value="<?php echo $Provincia1; ?>">
    <input type="hidden" name="tipologia-dropdown" value="<?php echo $Tipologia1; ?>">
    <input type="hidden" name="nome-realta" value="<?php echo $Realta1; ?>">
    <input name="submit_button" type="Submit" value="Torna alla mappa" class="btn btn-primary">
  </form>
  <?php
}
wp_reset_postdata();

?>
