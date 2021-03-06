<?php
/* -----------
QUERY E SCRIPT PER MAPPA
----------- */
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
  $ReteDisattiva = array();
  $RetiNascoste = get_option("icc_RealtaReteNascosta_attivi") ? get_option("icc_RealtaReteNascosta_attivi") : array();
  foreach ($RetiNascoste as $ReteDis){
    $ReteDisattiva[] = $ReteDis['ReteSlug'];
  }
  $filtroRete =  array(
    'taxonomy' => 'mapparete',
    'field'    => 'slug',
    'terms'    => $ReteDisattiva,
    'operator' => 'NOT IN',
  );
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
if((!is_user_logged_in() || $Regione == "tutteleregioni") && $Rete1 == "tuttelereti"){
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
  'post_status' => 'publish',
  'posts_per_page' => -1,
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
if($Regione == "tutteleregioni" && !get_query_var('regione')){
  $mapparegione = 'icc_mappa_realta_totale';
} else{
  $mapparegione = "icc_mappa_realta_".$Regione1;
}

if($Rete == "tuttelereti" ){
  $mapparete = 'icc_mappa_rete_totale';
} else{
  $mapparete = "icc_mappa_rete_".$Rete1;
}

if( $realtaSegnalate == 1 && icc_is_region_active($Regione)){
  ?>
  <div class="alert alert-warning" role="alert">
    Stai visualizzando sia le realtà verificate da noi <img src="<?php echo get_template_directory_uri();?>/plugin/mappa/asset/leaflet/images/marker-icon.png" alt="Marker mappa blu"> che quelle segnalate dagli utenti <img src="<?php echo get_template_directory_uri();?>/plugin/mappa/asset/leaflet/images/marker-icon-red.png" alt="Marker mappa blu">
  </div>
<?php }

if( !$loopMappaArchivio->have_posts()){
  ?>
  <div class="alert alert-danger" role="alert">
    Nessuna realtà trovata con questi filtri
  </div>
<?php } elseif(
  ($Rete != "tuttelereti" && $loopMappaArchivio->found_posts != get_option($mapparete)) ||
  ($Regione != "tutteleregioni" && $loopMappaArchivio->found_posts != get_option($mapparegione)))  { ?>
  <div class="alert alert-success" role="alert">
    <?php echo $loopMappaArchivio->found_posts; ?> realtà filtrate
  </div>
<?php } ?>

  <script>
    var map = L.map('mappa',{gestureHandling: true}).setView([42.088, 12.564], 6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      //attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
  }).addTo(map);
  var markers = L.markerClusterGroup({
    showCoverageOnHover: false,
    maxClusterRadius: 50,
  });

  var redIcon = L.icon({
    iconUrl: '<?php echo get_template_directory_uri();?>/plugin/mappa/asset/leaflet/images/marker-icon-red.png',
    shadowUrl: 'marker-shadow.png',

    iconSize:     [25, 41], // size of the icon
    iconAnchor:   [25, 41], // point of the icon which will correspond to marker's location
    popupAnchor:  [-13, -40] // point from which the popup should open relative to the iconAnchor
  });
  </script>
<?php

/* --------------
AGGIUNGO PUNTINI
-------------- */
if(get_transient('icc_mappa_tuttipuntini') && $filtro == 0){
  $tuttiIPuntini = get_transient('icc_mappa_tuttipuntini');

}else{
  $tuttiIPuntini = "[";
  while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();

    if(get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) && get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)){
      $tuttiIPuntini .= "[".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).", ".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],";
    }

  endwhile;
  $tuttiIPuntini .= "]";
  if ($filtro == 0){
    set_transient('icc_mappa_tuttipuntini',$tuttiIPuntini);
    set_transient('icc_mappa_tuttipuntini_lastupdate',strtotime(date('Y-m-d H:i:s')));
  }
}


/* --------------
AGGIUNGO POPUP
-------------- */
if(get_transient('icc_mappa_tuttipopup') && $filtro == 0 && !current_user_can('administrator') ){
  echo "<!--Popup da transient-->";
  echo get_transient('icc_mappa_tuttipopup');
}else{
  echo "<!--Popup da loop-->";
  $popupMappaScript = "";
  while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();
  $popupMappa = '';
  if ( has_post_thumbnail() ){
      $popupMappa .= '<img class="img-fluid" src="'.get_the_post_thumbnail_url('').'"><br>';
  }
  $popupMappa .= '<h3 class="h5">'.get_the_title().'</h3>';
  $popupMappa .= get_the_excerpt();
  $popupMappa .= '<br>';
  $popupMappa .= '<a href="'.get_the_permalink().'">Approfondisci</a>';
  if(get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) && get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)){
    $popupMappaScript .= "<script>\r\n";
      $popupMappaScript .= "var iccTitle = '". $popupMappa."';\r\n";
      $popupMappaScript .= "var altPuntino = \"". get_the_title() ."\";\r\n";
      $popupMappaScript .= "var puntino = L.marker([".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).",".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],{iccTitle: altPuntino,";
        if(get_the_terms( get_the_ID() , 'mappastato' )[0]->slug == "utente" ){
          $popupMappaScript .= "icon: redIcon";
        }
      $popupMappaScript .= "});\r\n";
      $popupMappaScript .= "puntino.bindPopup(iccTitle,{maxWidth : 250});\r\n";
      $popupMappaScript .= "markers.addLayer(puntino);\r\n";
    $popupMappaScript .= "</script>";
  }
  endwhile;
  if ($filtro == 0){
    set_transient('icc_mappa_tuttipopup',$popupMappaScript);
    set_transient('icc_mappa_tuttipopup_lastupdate',strtotime(date('Y-m-d H:i:s')));
  }
  echo $popupMappaScript;
}



?>
<script>

  map.addLayer(markers);
  map.fitBounds(<?php echo $tuttiIPuntini; ?>);
</script>
<?php
wp_reset_postdata();

/* -----------
FINE QUERY E SCRIPT PER MAPPA
----------- */


?>
