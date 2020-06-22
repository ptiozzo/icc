<?php get_header();?>
<div id="mappa" class="mx-auto">

</div>

<?php

$argsMappaArchivio = array(
  'post_type' => 'mappa',
);
$loopMappaArchivio = new WP_Query( $argsMappaArchivio );
if( $loopMappaArchivio->have_posts()) :
?>

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
while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();
  $popupMappa = get_the_excerpt();
  $popupMappa .= "<br>";
  $popupMappa .= "<a href='".get_the_permalink()."'>Approfondisci</a>";

 ?>
  <script>

  var title = "<?php echo $popupMappa; ?>";
  var puntino = L.marker([<?php echo get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) ?>, <?php echo get_post_meta( get_the_ID(), 'Mappa_Longitudine',true) ?>],{title: title,<?php if(get_the_terms( get_the_ID() , 'stato' )[0]->slug == "utente" ){echo "icon: redIcon";}?>});
  puntino.bindPopup(title);
  markers.addLayer(puntino);

  </script>

<?php
endwhile;
?>
<script>
map.addLayer(markers);
</script>
<?php
else:
  echo "Nessuna realtà trovata";
endif;
?>

<?php get_footer(); ?>
