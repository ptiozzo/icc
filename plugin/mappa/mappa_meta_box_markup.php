<?php

add_action("add_meta_boxes", "add_mappa_meta_box");

function add_mappa_meta_box()
{
    add_meta_box("mappa-meta-box", "Info mappa", "mappa_meta_box_markup", "mappa", "side");
}

function mappa_meta_box_markup($post)
{
  $mappa_latitudine = get_post_meta($post->ID, "Mappa_Latitudine", true);
  $mappa_longitudine = get_post_meta($post->ID, "Mappa_Longitudine", true);
  ?>
  <button type="button" class="components-button is-primary" style="width:90%; margin-bottom: 10px;" onclick="daIndirizzoACoordinate()">Coordinate da indirizzo</button><br>
  <label>Latitudine</label>
  <input id="latitudine" style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Latitudine" value="<?php echo get_post_meta($post->ID, 'Mappa_Latitudine', true);?>">
  <label>Longitudine</label>
  <input id="longitudine" style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Longitudine" value="<?php echo get_post_meta($post->ID, 'Mappa_Longitudine', true);?>">

  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet"></script>
  <!-- Esri Leaflet Geocoder -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">
  <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
  <script>
  const apiKey = "AAPKb2b250a84b8d40b08633a3728fc0ea61OyR7huBxIN7rsao1lcuVgWZeBJjC7cVJf_pRj0mQcUFNdRRlwb8lbD1dIuu6LZ_S";
  const geocoder = L.esri.Geocoding.geocodeService({
            apikey: apiKey
          });

  function daIndirizzoACoordinate() {
    geocoder.geocode().text(document.getElementById("Mappa_Indirizzo").value).run(function (err, results, response) {
      if (err) {
        console.log(err);
        return;
      }
      console.log(response);
      //alert("Longitudine: "+response['candidates']['0']['location']['y']);
      //alert("Latitudine: "+response['candidates']['0']['location']['x']);
      document.getElementById("latitudine").value = response['candidates']['0']['location']['y'];
      document.getElementById("longitudine").value = response['candidates']['0']['location']['x'];
    });
  }
  </script>

  <a href="/nuovarealtasegnalata/" style="margin-bottom: 10px;" target="_blank">Trova coordinate alternative</a><br>

  <label>Indirizzo Realtà</label>
  <input id="Mappa_Indirizzo" style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Indirizzo" value="<?php echo get_post_meta($post->ID, 'Mappa_Indirizzo', true);?>">
  <label>Sito Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Sito" value="<?php echo get_post_meta($post->ID, 'Mappa_Sito', true);?>">
  <label>Email Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Email" value="<?php echo get_post_meta($post->ID, 'Mappa_Email', true);?>">
  <label>Telefono Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Telefono" value="<?php echo get_post_meta($post->ID, 'Mappa_Telefono', true);?>">

  <label>Video di ICC sulla realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_VideoYT" value="<?php echo get_post_meta($post->ID, 'Mappa_VideoYT', true);?>">
  <label>Facebook Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_FB" value="<?php echo get_post_meta($post->ID, 'Mappa_FB', true);?>">
  <label>Instagram Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_IG" value="<?php echo get_post_meta($post->ID, 'Mappa_IG', true);?>">
  <label>Youtube Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_YT" value="<?php echo get_post_meta($post->ID, 'Mappa_YT', true);?>">
  <label>LinkedIn Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_IN" value="<?php echo get_post_meta($post->ID, 'Mappa_IN', true);?>">
  <label>Twitter Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_TW" value="<?php echo get_post_meta($post->ID, 'Mappa_TW', true);?>">
  <label>Data Chiusura Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Chiuso_Data" value="<?php echo get_post_meta($post->ID, 'Mappa_Chiuso_Data', true);?>">
  <label>Motivazione Chiusura Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Chiuso_Motivazione" value="<?php echo get_post_meta($post->ID, 'Mappa_Chiuso_Motivazione', true);?>">
  <label>PRIVACY - Segnalata da legale rappresentante</label>
  <select style="width:90%; margin-bottom: 10px;" name="Mappa_legaleRappresentante">
    <option value="">Non impostato</option>
    <option value="si" <?php if(get_post_meta($post->ID, 'Mappa_legaleRappresentante', true) == "si"){echo "selected";} ?>>Si</option>
    <option value="no" <?php if(get_post_meta($post->ID, 'Mappa_legaleRappresentante', true) == "no"){echo "selected";} ?>>No</option>
  </select>
  <label>PRIVACY - accettato termini e condizioni</label>
  <select style="width:90%; margin-bottom: 10px;" name="Mappa_privacy">
    <option value="">Non impostato</option>
    <option value="si" <?php if(get_post_meta($post->ID, 'Mappa_privacy', true) == "si"){echo "selected";} ?>>Si</option>
  </select>
  <?php
}


add_action("add_meta_boxes", "add_mappa_post_meta_box");

function add_mappa_post_meta_box()
{
    add_meta_box("mappa_post-meta-box", "Info per mappa", "mappa_post_meta_box_markup", "post", "side");
}

function mappa_post_meta_box_markup($post)
{
  ?>
  <label>Nome realtà di cui si parla</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Nome_Ralta" value="<?php echo get_post_meta($post->ID, 'Mappa_Nome_Ralta', true);?>">
  <?php
}
?>
