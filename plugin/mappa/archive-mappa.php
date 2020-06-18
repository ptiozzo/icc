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
  </script>
<?php
while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();
  $popupMappa = get_the_excerpt();
  $popupMappa .= "<br>";
  $popupMappa .= "<a href='".get_the_permalink()."'>Approfondisci</a>";
 ?>
  <script>
  var marker<?php echo get_the_ID()?> = L.marker([<?php echo get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) ?>, <?php echo get_post_meta( get_the_ID(), 'Mappa_Longitudine',true) ?>]).addTo(map);
  marker<?php echo get_the_ID()?>.bindPopup("<?php echo $popupMappa; ?>");
  </script>

<?php
endwhile;
else:
  echo "Nessuna realtà trovata";
endif;
?>

<?php get_footer(); ?>
