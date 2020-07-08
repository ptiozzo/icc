<?php
/* -----------
QUERY E SCRIPT PER MAPPA
----------- */
if($Categoria1 != 'tuttelecategorie'){
  $filtroCategoria = array(
    'taxonomy' => 'mappacategoria',
    'field'    => 'slug',
    'terms'    => $Categoria1,
  );
} else{
  $filtroCategoria = '';
}
if($Rete1 != 'tuttelereti'){
  $filtroRete =  array(
    'taxonomy' => 'mapparete',
    'field'    => 'slug',
    'terms'    => $Rete1,
  );
} else{
  $filtroRete = '';
}
if ($Provincia1 != 'tutteleprovince'){
  $filtroRegione = array(
    'taxonomy' => 'mapparegione',
    'field'    => 'slug',
    'terms'    => $Provincia1,
  );
} elseif ($Regione1 != 'tutteleregioni'){
  $filtroRegione = array(
    'taxonomy' => 'mapparegione',
    'field'    => 'slug',
    'terms'    => $Regione1,
  );
}else{
  $filtroRegione = '';
}
if ($Tipologia1 != 'tutteletipologie') {
  $filtroTipologia = array(
    'taxonomy' => 'mappatipologia',
    'field'    => 'slug',
    'terms'    => $Tipologia1,
  );
}else{
  $filtroTipologia = '';
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

if( $realtaSegnalate == 1){
  ?>
  <div class="alert alert-warning" role="alert">
    Stai visualizzando anche le realtà segnalate dagli utenti e non ancora approvare dalla redazione
  </div>
<?php }

if( !$loopMappaArchivio->have_posts()){
  ?>
  <div class="alert alert-danger" role="alert">
    Nessuna realtà trovata con questi filtri
  </div>
<?php } elseif($loopMappaArchivio->found_posts != get_option($mapparegione))  { ?>
  <div class="alert alert-success" role="alert">
    <?php echo $loopMappaArchivio->found_posts; ?> realtà filtrate
  </div>
<?php } ?>

  <script>
    var map = L.map('mappa',{gestureHandling: true}).setView([42.088, 12.564], 6);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      //attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/outdoors-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiaWNjLW1hcHBhIiwiYSI6ImNrYmpzNWZkcTByeXAzMXBqaGRzM2dmaWoifQ.TYuCegt1hW_2z5qyjDBZkg'
  }).addTo(map);
  var markers = L.markerClusterGroup({
    showCoverageOnHover: false,
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
$tuttiIPuntini = "[";
while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();
  $popupMappa = "";
  if ( has_post_thumbnail() ){
      $popupMappa .= "<img class='img-fluid' src='".get_the_post_thumbnail_url('')."' /><br>";
  }
  $popupMappa .= "<h3 class='h5'>".get_the_title()."</h5>";
  $popupMappa .= get_the_excerpt();
  $popupMappa .= "<br>";
  $popupMappa .= "<a href='".get_the_permalink()."'>Approfondisci</a>";
  if(get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) && get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)){
    $tuttiIPuntini .= "[".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).", ".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],";
    ?>
    <script>

      var title = "<?php echo $popupMappa; ?>";
      var puntino = L.marker([<?php echo get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) ?>, <?php echo get_post_meta( get_the_ID(), 'Mappa_Longitudine',true) ?>],{title: title,<?php if(get_the_terms( get_the_ID() , 'mappastato' )[0]->slug == "utente" ){echo "icon: redIcon";}?>});
      puntino.bindPopup(title);
      markers.addLayer(puntino);

    </script>
    <?php
  }




endwhile;
$tuttiIPuntini .= "]";
?>
<script>
  map.addLayer(markers);
  map.fitBounds(<?php echo $tuttiIPuntini; ?>);
</script>
<?php
//endif;
//echo $tuttiIPuntini;

/* -----------
FINE QUERY E SCRIPT PER MAPPA
----------- */
?>
