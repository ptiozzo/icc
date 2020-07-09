<?php get_header();

$daImportare = 800;

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
  echo "<table style='border: 1px solid grey;'>";
  while (($data = fgetcsv($handle, 100, ",",'"')) !== FALSE && $row <= $daImportare) {
    if(post_exists( ucfirst($data[0]),'','','mappa') == 0){
      echo "<tr style='border: 1px solid grey;'>";
      $num = count($data);
      echo "<td style='border: 1px solid grey;'>".$row . "</td>\n";

      $image = "http://www.pianetafuturo.it/uploads/pagine/".$data[10].".jpg";
      if(!@getimagesize($image)){
        $image = "http://www.pianetafuturo.it/uploads/pagine/".$data[10].".png";
        if(!@getimagesize($image)){
          $image = "http://www.pianetafuturo.it/uploads/pagine/".$data[10].".gif";
        }
      }

      echo "<td style='border: 1px solid grey;'><img src='".$image."'></td>";
      echo "<td style='border: 1px solid grey;'>".$data[0] . "</td>\n";//nome realtà
      echo "<td style='border: 1px solid grey;'>".$data[1] . "</td>\n";//descrizione realtà

      //Tipologia da splittare
      $var = explode(",",$data[2]);
      $varNum = count($var)-1;
      echo "<td style='border: 1px solid grey;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";
      //echo "<td style='border: 1px solid grey;'>".$data[2] . "</td>\n";

      //regione/provincia da splittare
      $var = explode(",",$data[3]);
      $varNum = count($var)-1;
      echo "<td style='border: 1px solid grey;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";
      //echo "<td style='border: 1px solid grey;'>".$data[3] . "</td>\n";

      //Indirizzo da unire
      $indirizzo = "";
      if($data[4] != ""){
        $indirizzo .= $data[4].", ";
      }
      if($data[5] != ""){
        $indirizzo .= $data[5].", ";
      }
      if($data[6] != ""){
        $indirizzo .= $data[6].", ";
      }
      if($data[7] != ""){
        $indirizzo .= $data[7];
      }
      echo "<td style='border: 1px solid grey;'>".$indirizzo. "</td>\n"; //indirizzo

      echo "<td style='border: 1px solid grey;'>".$data[8] . "</td>\n";//lat
      echo "<td style='border: 1px solid grey;'>".$data[9] . "</td>\n";//long


      echo "<td style='border: 1px solid grey;'>".$data[10] . "</td>\n";//slug
      echo "<td style='border: 1px solid grey;'>".$data[11] . "</td>\n";//mail
      echo "<td style='border: 1px solid grey;'>".$data[12] . "</td>\n";//telfono
      echo "<td style='border: 1px solid grey;'>".$data[13] . "</td>\n";//sito
      echo "<td style='border: 1px solid grey;'>".$data[14] . "</td>\n";//FB
      echo "<td style='border: 1px solid grey;'>".$data[15] . "</td>\n";//Twitter

      //da splittare Stato
      $var = explode(",",$data[16]);
      $varNum = count($var)-1;
      echo "<td style='border: 1px solid grey;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }

      //echo "<td style='border: 1px solid grey;'>".$data[14] . "</td>\n";//Visto da noi/viaggio


      echo "<td style='border: 1px solid grey;'>".$data[17] . "</td>\n";//Identificativo video YT
      echo "<td style='border: 1px solid grey;'>".$data[18] . "</td>\n";//Approfondisci

      //rete da splittare
      $var = explode(",",$data[19]);
      $varNum = count($var)-1;
      echo "<td style='border: 1px solid grey;'><ul>";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }
      echo "</ul></td>";
      //echo "<td style='border: 1px solid grey;'>".$data[17] . "</td>\n";//rete
      echo "</tr>";
    }
    echo "<!-- --".$data[10].": ".post_exists( ucfirst($data[0]),'','','mappa')."-- -->";



    if( post_exists( ucfirst($data[0]),'','','mappa') == 0 && $row <= $daImportare){
      /* ---------------------
      IMPORT
      --------------------- */
      $content = strip_tags( $data[1] );
      $new_post = array(
        'post_title' => ucfirst($data[0]),
        'post_content' => $content,
        //'post_content' => 'test',
        'post_status' => 'publish',
        'post_name' => $data[10],
        'post_type' => 'mappa',
        'comment_status' => 'close',
      );
      $post_id = wp_insert_post($new_post);

      //Categoria da splittare
      $var = explode(",",$data[2]);
      $varNum = count($var)-1;
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
      $varNum = count($var)-1;
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
      $var = explode(",",$data[16]);
      $varNum = count($var)-1;
      if ($varNum >= 1){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            wp_set_object_terms($post_id,$var[$i],'mappastato');
          } else {
            wp_set_object_terms($post_id,$var[$i],'mappastato',true);
          }
        }
      }

      //rete
      $var = explode(",",$data[19]);
      $varNum = count($var)-1;
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

      /* ---------------------
      IMMAGINE!
      --------------------- */

      // Gives us access to the download_url() and wp_handle_sideload() functions
      require_once( ABSPATH . 'wp-admin/includes/file.php' );

      // URL to the WordPress logo
      $url = $image;
      $timeout_seconds = 5;

      // Download file to temp dir
      $temp_file = download_url( $url, $timeout_seconds );
      if ( !is_wp_error( $temp_file ) ) {

          // Array based on $_FILE as seen in PHP file uploads
          $file = array(
              'name'     => basename($url), // ex: wp-header-logo.png
              'type'     => 'image/png',
              'tmp_name' => $temp_file,
              'error'    => 0,
              'size'     => filesize($temp_file),
          );

          $overrides = array(
              // Tells WordPress to not look for the POST form
              // fields that would normally be present as
              // we downloaded the file from a remote server, so there
              // will be no form fields
              // Default is true
              'test_form' => false,

              // Setting this to false lets WordPress allow empty files, not recommended
              // Default is true
              //'test_size' => true,
          );

          // Move the temporary file into the uploads directory
          $results = wp_handle_sideload( $file, $overrides );
          if ( !empty( $results['error'] ) ) {
              echo "Errore: ".$results['error']."--";
              // Insert any error handling here
          } else {

              $filename  = $results['file']; // Full path to the file
              $local_url = $results['url'];  // URL to the file in the uploads dir
              $type      = $results['type']; // MIME type of the file


              $wp_filetype = wp_check_filetype($filename, null);
              $attachment = array(
                  'post_mime_type' => $type,
                  'post_title' => get_the_title($post_id),
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
              // Perform any actions here based in the above results
          }

      }

      /* ---------------------
      FINE IMMAGINE
      --------------------- */


      //update_post_meta($post_id, "Mappa_Latitudine", $_POST["Mappa_Latitudine"]);
      //update_post_meta($post_id, "Mappa_Longitudine", $_POST["Mappa_Longitudine"]);
      if($data[9]) {
          update_post_meta($post_id, "Mappa_Latitudine", $data[9]);
      }
      if($data[8]) {
          update_post_meta($post_id, "Mappa_Longitudine", $data[8]);
      }
      if($indirizzo) {
          update_post_meta($post_id, "Mappa_Indirizzo", $indirizzo);
      }
      if($data[13]) {
          update_post_meta($post_id, "Mappa_Sito", $data[13]);
      }
      if($data[11]) {
          update_post_meta($post_id, "Mappa_Email", $data[11]);
      }
      if($data[12]) {
          update_post_meta($post_id, "Mappa_Telefono", $data[12]);
      }
      if($data[14]) {
          update_post_meta($post_id, "Mappa_FB", $data[14]);
      }
      if($data[15]) {
          update_post_meta($post_id, "mappa_TW", $data[15]);
      }
      if($data[17]) {
          update_post_meta($post_id, "Mappa_VideoYT", $data[17]);
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
