<?php get_header();?>
<div id="mappa" class="mx-auto">

</div>
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

<script>
var marker = L.marker([45.068753, 7.587653]).addTo(map);
marker.bindPopup("<b>Hello world!</b><br>I am a popup.");

</script>

<?php get_footer(); ?>
