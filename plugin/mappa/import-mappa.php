<?php get_header();

if ( ! current_user_can( 'administrator' ) ) {
  ?>
  <script>
    window.location.href = "/mappa/";
  </script>

  <?php
}


$daImportare = 60;

if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}
?>
<?php

echo "<h2>IMPORT MAPPA</h2>";
$row = 1;
$myFile = get_template_directory()."/plugin/mappa/export-mappa.csv";
echo $myFile."<br>";
if (!file_exists($myFile)) {
  print 'File not found';
}
if (($handle = fopen($myFile, "r")) !== FALSE) {
  echo "<table style='border: 1px solid grey; min-width: 10px;'>";
  while (($data = fgetcsv($handle, 0, ";")) !== FALSE && $row <= $daImportare) {
    if(post_exists( ucfirst($data[0]),'','','mappa') == 0)
    {
      echo "<tr style='border: 1px solid grey; min-width: 10px;'>";
      $num = count($data);
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$row . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[0] . "</td>\n";//nome realtà
      echo "<td style='border: 1px solid grey; min-width: 10px;'>"./*$data[1]*/"descrizione" . "</td>\n";//descrizione realtà

      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[2]. "</td>\n"; //Tipologia/Categoria
      //Tipologia/Categoria da splittare
      $var = explode(",",$data[2]);
      $varNum = count($var);
      echo "<td style='border: 1px solid grey; min-width: 10px;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";

      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[3]. "</td>\n"; //Regione/Provincia
      //Regione/Provincia da splittare
      $var = explode(",",$data[3]);
      $varNum = count($var);
      echo "<td style='border: 1px solid grey; min-width: 10px;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";

      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[4]. "</td>\n"; //Indirizzo

      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[5]. "</td>\n"; //Latitudine
      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[6]. "</td>\n"; //Longitudine

      //Lat/Long da splittare
      $var = explode(" ",$data[5]);
      $varNum = count($var);
      echo "<td style='border: 1px solid grey; min-width: 10px;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";

      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[7]. "</td>\n"; //Slug
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[8]. "</td>\n"; //Mail
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[9]. "</td>\n"; //Telefono
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[10]. "</td>\n"; //Sito
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[11]. "</td>\n"; //Facebook
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[12]. "</td>\n"; //Twitter

      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[13]. "</td>\n"; //Stato
      //Stato da splittare
      $var = explode(",",$data[13]);
      $varNum = count($var);
      echo "<td style='border: 1px solid grey; min-width: 10px;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";

      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[14]. "</td>\n"; //Video YT Presentazioe
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[15]. "</td>\n"; //Approfondisci

      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[16]. "</td>\n"; //Rete
      //Rete da splittare
      $var = explode(",",$data[16]);
      $varNum = count($var);
      echo "<td style='border: 1px solid grey; min-width: 10px;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";

      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[17]. "</td>\n"; //Instagram
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[18]. "</td>\n"; //Chiusura motivazione
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[19]. "</td>\n"; //YouTube realtà
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[20]. "</td>\n"; //Linkedin


    }
    echo "<!-- --".$data[0].": ".post_exists( ucfirst($data[0]),'','','mappa')."-- -->";

    if( post_exists( ucfirst($data[0]),'','','mappa') == 0 && $row <= $daImportare && $row > 1){
      /* ---------------------
      IMPORT
      --------------------- */
      $content = strip_tags( $data[1] );
      $new_post = array(
        'post_title' => ucfirst($data[0]),
        'post_content' => $content,
        'post_status' => 'publish',
        'post_name' => $data[7],
        'post_type' => 'mappa',
        'comment_status' => 'close',
      );
      $post_id = wp_insert_post($new_post);

      //Categoria/Tipologia da splittare
      $var = explode(",",$data[2]);
      $varNum = count($var);
      if ($varNum >= 1){
        $tipologia = 1;
        $categoria = 1;
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($var[$i] == "Non profit" ||
           $var[$i] == "ONLUS" ||
           $var[$i] == "Persona" ||
           $var[$i] == "Profit" ||
           $var[$i] == "Pubblico" ||
           $var[$i] == "Ditta individuale" ||
           $var[$i] == "Ass. di promozione sociale (APS)" ||
           $var[$i] == "Società a responsabilità limitata (SRL)" ||
           $var[$i] == "Associazione" ||
           $var[$i] == "Associazione Culturale" ||
           $var[$i] == "Associazione sportiva dilettantistica (ASD)" ||
           $var[$i] == "Cooperativa sociale" ||
           $var[$i] == "Informale" ||
           $var[$i] == "Organizzazione di volontariato (ODV)" ||
           $var[$i] == "Società cooperativa" ||
           $var[$i] == "Società in nome collettivo (SNC)" ||
           $var[$i] == "Società per azioni" ||
           $var[$i] == "Società Semplice" ||
           $var[$i] == "Trust" ||
           $var[$i] == "Fondazione" ||
           $var[$i] == "Cooperativa agricola" ||
           $var[$i] == "Cooperativa sociale mista" ||
           $var[$i] == "Organizzazione non goverativa (ONG)" ||
           $var[$i] == "Pubblica Amministrazione" ||
           $var[$i] == "Società a responsabilità limitata semplificata" ||
           $var[$i] == "Società di persone" ||
           $var[$i] == "Società in accomandita semplice (SAS)" ||
           $var[$i] == "Privato"){
            if($tipologia == 1){
              wp_set_object_terms($post_id,$var[$i],'mappatipologia');
              $tipologia++;
            } else {
              wp_set_object_terms($post_id,$var[$i],'mappatipologia',true);
            }
          }else{
            if($categoria == 1){
              wp_set_object_terms($post_id,$var[$i],'mappacategoria');
              $categoria++;
            } else {
              wp_set_object_terms($post_id,$var[$i],'mappacategoria',true);
            }
          }
        }
      }

      //regione/provincia da splittare
      $var = explode(",",$data[3]);
      $varNum = count($var);
      if ($varNum >= 1){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            wp_set_object_terms($post_id,$var[$i],'mapparegione');
          } else {
            wp_set_object_terms($post_id,$var[$i],'mapparegione',true);
          }
        }
      }

      //stato da splittare
      $var = explode(",",$data[13]);
      $varNum = count($var);
      if ($varNum >= 1){
        for ($iStato=0; $iStato < $varNum; $iStato++) {
          $var[$iStato] = trim($var[$iStato]);
          if($iStato == 0){
            wp_set_object_terms($post_id,$var[$iStato],'mappastato');
          } else {
            wp_set_object_terms($post_id,$var[$iStato],'mappastato',true);
          }
        }
      }

      //rete
      $var = explode(",",$data[16]);
      $varNum = count($var);
      if ($varNum >= 1){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            wp_set_object_terms($post_id,$var[$i],'mapparete');
          } else {
            wp_set_object_terms($post_id,$var[$i],'mapparete',true);
          }
        }
      }


      //Lat/Long
      $var = explode(" ",$data[5]);
      $varNum = count($var);
      if ($varNum >= 1){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            update_post_meta($post_id, "Mappa_Longitudine", $var[$i]);
          } else {
            update_post_meta($post_id, "Mappa_Latitudine", $var[$i]);
          }
        }
      }

      if($data[4]) {
          update_post_meta($post_id, "Mappa_Indirizzo", $data[4]);
      }
      if($data[8]) {
          update_post_meta($post_id, "Mappa_Email", $data[8]);
      }
      if($data[9]) {
          update_post_meta($post_id, "Mappa_Telefono", $data[9]);
      }
      if($data[10]) {
          update_post_meta($post_id, "Mappa_Sito", $data[10]);
      }
      if($data[11]) {
          update_post_meta($post_id, "Mappa_FB", $data[11]);
      }
      if($data[12]) {
          update_post_meta($post_id, "mappa_TW", $data[12]);
      }
      if($data[14]) {
          update_post_meta($post_id, "Mappa_VideoYT", $data[14]);
      }
      if($data[17]) {
          update_post_meta($post_id, "Mappa_IG", $data[17]);
      }
      if($data[18]) {
          update_post_meta($post_id, "Mappa_Chiuso_Motivazione", $data[18]);
          if($iStato == 0){
            wp_set_object_terms($post_id,'Chiuso','mappastato');
          } else {
            wp_set_object_terms($post_id,'Chiuso','mappastato',true);
          }
      }

      if($data[19]) {
        update_post_meta($post_id, "Mappa_YT", $data[19]);
      }
      if($data[20]) {
        update_post_meta($post_id, "Mappa_IN", $data[20]);
      }


    }

    $row++;
  }
  echo "</table>";
  fclose($handle);
  mappa_calcolo_realta();
} else {
  echo "<p>Non riesco ad aprire il file!</p>";
}
 ?>
