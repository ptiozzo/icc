<?php get_header();?>
<div class="container">


<h1><?php the_title(); ?></h1>

<?php

if(!is_user_logged_in()){
  ?>
  <div class="alert alert-warning mt-3" role="alert">
    <p>Per poter inserire una nuova realtà devi prima <a class="alert-link" href="/wp-login.php?redirect_to=<?php echo get_the_permalink() ?>">effettuare l'accesso</a> o <a class="alert-link" href="/registrati/?redirect_to=<?php echo get_the_permalink() ?>">registrarti</a></p>
  </div>
  <?php
}


$errors = array();

if( $_POST['submit_button'] ){

  if($_POST['categoria'] == "tuttelecategorie"){
    $errors['categoria'] = "Devi selezionare una categoria";
  }

  if($_POST['regionemappa'] == "_tutteleregioni"){
    $errors['regionemappa'] = "Devi selezionare una regione";
  }

  if($_POST['tipologia'] == "tutteletipologie"){
    $errors['tipologia'] = "Devi selezionare una tipologia";
  }

  if(0 === preg_match("/.{1,}/", $_POST['titolo'])){
    $errors['titolo'] = "Non hai inserito il nome della realtà";
  }

  if(str_word_count($_POST['content']) < 6){
    $errors['content'] = "Devi inserire una descrizione di almeno 6 parole";
  }

  if($_FILES['image']['size'] != 0){
    if(strpos($_FILES['image']["type"],'image') === false){
      $errors['image'] = "Il file caricato non è un'immagine";
    }
  }
  if($_POST['Mappa_Latitudine'] == "" || $_POST['Mappa_Longitudine'] == ""){
    $errors['puntino'] = "Non hai selezionato dove si trova sulla mappa";
  }

  if($_POST['indirizzo'] == ""){
    $errors['indirizzo'] = "Devi inserire un indirizzo";
  }


  if(0 === count($errors)){

      $new_post = array(
  			'post_title' => $_POST['titolo'],
  			'post_content' => $_POST['content'],
  			'post_status' => 'pending',
  			'post_name' => $_POST['titolo'],
  			'post_type' => 'mappa',
        'comment_status' => 'open'
  		);
      $post_id = wp_insert_post($new_post);
      wp_set_object_terms($post_id,$_POST['regionemappa'],'mapparegione');
      wp_set_object_terms($post_id,"utente",'mappastato');

      if($_POST["categoria"] != "tuttelecategorie") {
        wp_set_object_terms($post_id,$_POST['categoria'],'mappacategoria');
      }
      if($_POST["tipologia"] != "tutteletipologie") {
        wp_set_object_terms($post_id,$_POST['tipologia'],'mappatipologia');
      }

      if($_POST["Mappa_Latitudine"] != "") {
          update_post_meta($post_id, "Mappa_Latitudine", $_POST["Mappa_Latitudine"]);
      }
      if($_POST["Mappa_Longitudine"] != "") {
          update_post_meta($post_id, "Mappa_Longitudine", $_POST["Mappa_Longitudine"]);
      }

      if($_POST["indirizzo"] != "") {
          update_post_meta($post_id, "Mappa_Indirizzo", $_POST["indirizzo"]);
      }
      if($_POST["sito"] != "") {
          update_post_meta($post_id, "Mappa_Sito", $_POST["sito"]);
      }
      if($_POST["email"] != "") {
          update_post_meta($post_id, "Mappa_Email", $_POST["email"]);
      }
      if($_POST["telefono"] != "") {
          update_post_meta($post_id, "Mappa_Telefono", $_POST["telefono"]);
      }
      if($_POST["mappa_FB"] != "") {
          update_post_meta($post_id, "Mappa_FB", $_POST["mappa_FB"]);
      }
      if($_POST["mappa_IG"] != "") {
          update_post_meta($post_id, "Mappa_IG", $_POST["mappa_IG"]);
      }
      if($_POST["mappa_YT"] != "") {
          update_post_meta($post_id, "Mappa_YT", $_POST["mappa_YT"]);
      }
      if($_POST["mappa_IN"] != "") {
          update_post_meta($post_id, "Mappa_IN", $_POST["mappa_IN"]);
      }
      if($_POST["mappa_TW"] != "") {
          update_post_meta($post_id, "mappa_TW", $_POST["mappa_TW"]);
      }
      if($_POST["Mappa_VideoYT"] != "") {
          update_post_meta($post_id, "Mappa_VideoYT", $_POST["Mappa_VideoYT"]);
      }



      if ( isset($_FILES['image']) && $_FILES['image']['size'] != 0 ) {
          $upload = wp_upload_bits($_FILES["image"]["name"], null, file_get_contents($_FILES["image"]["tmp_name"]));

          if ( ! $upload_file['error'] ) {

              $filename = $upload['file'];
              $wp_filetype = wp_check_filetype($filename, null);
              $attachment = array(
                  'post_mime_type' => $wp_filetype['type'],
                  'post_title' => sanitize_file_name($_FILES["image"]["name"]),
                  'post_content' => '',
                  'post_status' => 'inherit'
              );

              $attachment_id = wp_insert_attachment( $attachment, $filename, $post_id );

              if ( ! is_wp_error( $attachment_id ) ) {
                  require_once(ABSPATH . 'wp-admin/includes/image.php');

                  $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                  wp_update_attachment_metadata( $attachment_id, $attachment_data );
                  set_post_thumbnail( $post_id, $attachment_id );
              }
          }
      }


    $url = "/mappa/";

    $to = "webmaster@italiachecambia.org";
    $subject = 'ICC - Nuova Realtà mappata da revisionare: '.$_POST['titolo'];
    $body = "<html><body>";
    $body .= "Ciao <br>";
    $body .= "E' presente una nuova realtà mappata da revisionare. <br>";
    $body .= "</body></html>";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';
    $headers[] = 'Bcc: ptiozzo@me.com';

    wp_mail( $to, $subject, $body, $headers );

    echo '<div class="alert alert-success mt-3" role="alert">';
    echo "Realtà mappata creata, ti invieremo una mail appena la tua segnalazione sarà approvato dalla redazione. ";
    echo 'La redazione potrebbe apportare alcune modifiche al titolo ';
    echo 'o al testo della tua inserzione per agevolare il raggiungimento del tuo obiettivo.</div>';

    ?>
    <script>
      setTimeout(function(){
        window.location.href = "<?php echo $url;?>";
      }, 5000);
    </script>
    <?php

    $success = 1;

  } else {
    ?>
    <div class="alert alert-danger" role="alert">
      <ul>
      <?php
        foreach ($errors as $error) {
          echo "<li>" .$error."</li>";
        }
        ?>
      </ul>
    </div>

    <?php
  }
}


if($success != 1 && is_user_logged_in() ){

    $form_categoria = $_POST['categoria'];
    $form_regioni = $_POST['regionemappa'];
    $form_tipologia = $_POST['tipologia'];
    $form_titolo = $_POST['titolo'];
    $form_content = $_POST['content'];
    $form_latitudine = $_POST['Mappa_Latitudine'];
    $form_longitudine = $_POST['Mappa_Longitudine'];
    $form_indirizzo = $_POST['indirizzo'];
    $form_sito = $_POST['sito'];
    $form_email = $_POST['email'];
    $form_telefono = $_POST['telefono'];
    $form_mappa_videoYT = $_POST['Mappa_VideoYT'];
    $form_mappa_FB = $_POST['mappa_FB'];
    $form_mappa_IG = $_POST['mappa_IG'];
    $form_mappa_YT = $_POST['mappa_YT'];
    $form_mappa_IN = $_POST['mappa_IN'];
    $form_mappa_TW = $_POST['mappa_TW'];
    $form_invia = "Aggiungi realtà sulla mappa";

  ?>
  <form class="mt-3 mb-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>" enctype="multipart/form-data">
    <select name="categoria" class="custom-select" >
      <option value="tuttelecategorie" <?php if ($form_tipologia == "tuttelecategorie") {echo 'selected';} ?>>Seleziona una categoria</option>
      <?php
        $categories = get_terms( array('taxonomy' => 'mappacategoria','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
        foreach ($categories as $category) {
          if($category->slug != 'risolto'){
            $option = '<option value="'.$category->slug.'" ';
            if ($form_tipologia == $category->slug) {$option .= 'selected ';};
            $option .= '>'.$category->name;
            $option .= '</option>';
            echo $option;
          }
        }
      ?>
    </select>
    <?php
    if($_POST['segnala_realta']) {
      echo '<input name="regionemappa" type="hidden" value="'.$_POST['regionemappa'].'">';
      echo '<input name="segnala_realta" type="hidden" value="'.$_POST['regionemappa'].'">';
    }
    ?>
      <select name="regionemappa" class="custom-select mx-2" <?php if($_POST['segnala_realta']){echo "disabled";} ?> >
        <?php
          $categories = get_terms( array('taxonomy' => 'mapparegione','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC','parent' => 0));
          ?>
          <option value="_tutteleregioni" <?php if ($form_regioni == "_tutteleregioni") {echo 'selected';} ?>>Seleziona la regione</option>
          <?php
          foreach ($categories as $category) {
            if($category->slug != "_tutteleregioni"){
              $option = '<option value="'.$category->slug.'" ';
              if ($form_regioni == $category->slug) {$option .= 'selected ';};
              $option .= '>'.$category->name;
              $option .= '</option>';
              echo $option;
            }
          }
        ?>
      </select>
    <select name="tipologia" class="custom-select mx-2">
      <option value="tutteletipologie" <?php if ($form_tipologia == "tutteletipologie") {echo 'selected';} ?>>Seleziona la tipologia</option>
      <?php
        $categories = get_terms( array('taxonomy' => 'mappatipologia','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
        foreach ($categories as $category) {
          $option = '<option value="'.$category->slug.'" ';
          if ($form_tipologia == $category->slug) {$option .= 'selected ';};
          $option .= '>'.$category->name;
          $option .= '</option>';
          echo $option;
        }
      ?>
    </select>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="titolo" class="form-control w-75" type="text" name="titolo" placeholder="Inserisci il nome della realtà" <?php echo 'value="'.$form_titolo .'"';?>>
      <small id="titoloHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <textarea id="content" class="form-control w-75" type="text" name="content" placeholder="Descrivi in modo dettagliato la realtà" rows="5"><?php echo $form_content;?></textarea>
      <small id="contentHelp" class="form-text text-muted">Inserire una descrizione dettagliata della realtà, questo sarà il testo che comparirà sulla mappa.</small>
    </div>
    <div class="col-12">
      <h3>MAPPA</h3>
      <p>
        Posiziona la tua realtà sulla mappa cliccando sulla lente del cerca.
        Inserisci l’indirizzo e seleziona dall’elenco quello corretto.
        Nella mappa comparirà il pin sull’indirizzo selezionato, clicca sul pin per confermare.
        Apparirà il pop up di conferma “la realtà si trova qui”. 
        Ricordati di inserire l’indirizzo anche nel campo dedicato sotto la mappa.
      </p>
      <div id="mappa" style="height: 400px;"></div>
      <!-- Load Esri Leaflet from CDN -->
      <script src="https://unpkg.com/esri-leaflet"></script>
      <!-- Esri Leaflet Geocoder -->
      <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">
      <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
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


      // create the geocoding control and add it to the map
      var searchControl = L.esri.Geocoding.geosearch({useMapBounds:false,}).addTo(map);

      // create an empty layer group to store the results and add it to the map
      var results = L.layerGroup().addTo(map);

      // listen for the results event and add every result to the map
      searchControl.on("results", function(data) {
          results.clearLayers();
          for (var i = data.results.length - 1; i >= 0; i--) {
              results.addLayer(L.marker(data.results[i].latlng));
          }
      });


      var popup = L.popup();

      function onMapClick(e) {
          popup
              .setLatLng(e.latlng)
              .setContent("La realtà si trova qui!")
              .openOn(map);
              var puntino = e.latlng.toString();
              var coordinate = puntino.split("(");
              var latitudine = coordinate[1].split(",");
              var longitudine = latitudine[1].split(",");
              var longitudine2 = latitudine[1].split(")");
              document.getElementById("latitudine").value = latitudine[0];
              document.getElementById("longitudine").value = longitudine2[0];
      }

      map.on('click', onMapClick);
      </script>
    </div>
    <div class="form-group my-2 col-6 d-block px-0">
      <input id="latitudine" class="form-control w-100" type="text" name="Mappa_Latitudine" placeholder="Latitudine" value="<?php echo $form_latitudine;?>">
      <small id="latitudineHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-6 d-block px-0">
      <input id="longitudine" class="form-control w-100" type="text" name="Mappa_Longitudine" placeholder="Longitudine" value="<?php echo $form_longitudine;?>">
      <small id="longitudineHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="indirizzo" class="form-control w-75" type="text" name="indirizzo" placeholder="Indirizzo della realtà" value="<?php echo $form_indirizzo;?>">
      <small id="indirizzoHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="sito" class="form-control w-75" type="url" name="sito" placeholder="Sito web della realtà" value="<?php echo $form_sito;?>">
      <small id="sitoHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="email" class="form-control w-75" type="email" name="email" placeholder="Email della realtà" value="<?php echo $form_email;?>">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="telefono" class="form-control w-75" type="tel" name="telefono" placeholder="Numero di telefono della realtà" value="<?php echo $form_telefono;?>">
      <small id="telefonoHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12">
      <label for="image">Aggiungi un'immagine della tua realtà</label>
      <input type="file" name="image" class="form-control-file" id="image">
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="Mappa_VideoYT" class="form-control w-75" type="url" name="Mappa_VideoYT" placeholder="Inserisci il link ad un video YouTube di presentazione" value="<?php echo $form_mappa_videoYT;?>">
      <small id="Mappa_VideoYTHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="mappa_FB" class="form-control w-75" type="url" name="mappa_FB" placeholder="Inserisci il link alla pagine Facebook della realtà" value="<?php echo $form_mappa_FB;?>">
      <small id="mappa_FBHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="mappa_IG" class="form-control w-75" type="url" name="mappa_IG" placeholder="Inserisci il link alla pagine Instagram della realtà" value="<?php echo $form_mappa_IG;?>">
      <small id="mappa_IGHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="mappa_YT" class="form-control w-75" type="url" name="mappa_YT" placeholder="Inserisci il link al canale YouTube della realtà" value="<?php echo $form_mappa_YT;?>">
      <small id="mappa_YTHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="mappa_IN" class="form-control w-75" type="url" name="mappa_IN" placeholder="Inserisci il link alla pagine LinkedIn della realtà" value="<?php echo $form_mappa_IN;?>">
      <small id="mappa_INHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group my-2 col-12 d-block px-0">
      <input id="mappa_TW" class="form-control w-75" type="url" name="mappa_TW" placeholder="Inserisci il link alla pagine Twitter della realtà" value="<?php echo $form_mappa_IN;?>">
      <small id="mappa_TWHelp" class="form-text text-muted"></small>
    </div>

    <input name="submit_button" type="Submit" value="<?php echo $form_invia;?>" class="btn btn-secondary">
  </form>

<?php } ?>


</div>

<?php get_footer(); ?>
