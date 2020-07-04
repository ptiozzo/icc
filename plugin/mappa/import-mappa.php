<?php

echo "<h2>IMPORT MAPPA</h2>";
$row = 1;
$myFile = get_template_directory()."/plugin/mappa/export-mappa.csv";
echo $myFile;
if (!file_exists($myFile)) {
  print 'File not found';
}
if (($handle = fopen($myFile, "r")) !== FALSE) {
  echo "<table style='border: 1px solid grey;'>";
  while (($data = fgetcsv($handle, 100, ",",'"')) !== FALSE) {
    echo "<tr style='border: 1px solid grey;'>";
    $num = count($data);
    echo "<td style='border: 1px solid grey;'>".$row . "</td>\n";

    $image = "http://www.pianetafuturo.it/uploads/pagine/".$data[8].".jpg";
    if(!@getimagesize($image)){
      $image = "http://www.pianetafuturo.it/uploads/pagine/".$data[8].".png";
      if(!@getimagesize($image)){
        $image = "http://www.pianetafuturo.it/uploads/pagine/".$data[8].".gif";
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

    echo "<td style='border: 1px solid grey;'>".$data[8] . "</td>\n";//slug
    echo "<td style='border: 1px solid grey;'>".$data[9] . "</td>\n";//mail
    echo "<td style='border: 1px solid grey;'>".$data[10] . "</td>\n";//telfono
    echo "<td style='border: 1px solid grey;'>".$data[11] . "</td>\n";//sito
    echo "<td style='border: 1px solid grey;'>".$data[12] . "</td>\n";//FB
    echo "<td style='border: 1px solid grey;'>".$data[13] . "</td>\n";//Twitter

    //da splittare Stato
    $var = explode(",",$data[14]);
    $varNum = count($var)-1;
    echo "<td style='border: 1px solid grey;'><ul>";
    for ($i=0; $i < $varNum; $i++) {
        echo "<li>".$var[$i]."</li>";
    }

    //echo "<td style='border: 1px solid grey;'>".$data[14] . "</td>\n";//Visto da noi/viaggio


    echo "<td style='border: 1px solid grey;'>".$data[15] . "</td>\n";//Identificativo video YT
    echo "<td style='border: 1px solid grey;'>".$data[16] . "</td>\n";//Approfondisci

    //rete da splittare
    $var = explode(",",$data[17]);
    $varNum = count($var)-1;
    echo "<td style='border: 1px solid grey;'><ul>";
    for ($i=0; $i < $varNum; $i++) {
        echo "<li>".$var[$i]."</li>";
    }
    echo "</ul></td>";
    //echo "<td style='border: 1px solid grey;'>".$data[17] . "</td>\n";//rete
    echo "<tr>";

    if($row == 4){
      /* ---------------------
      IMPORT
      --------------------- */
      $content = strip_tags( $data[1] );
      $new_post = array(
        'post_title' => ucfirst($data[0]),
        'post_content' => $content,
        //'post_content' => 'test',
        'post_status' => 'pending',
        'post_name' => $data[8],
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
           $var[$i] == "Società a responsabilità limitata (SRL)" ||
           $var[$i] == "Privato"){
            if($tipologia == 1){
              wp_set_object_terms($post_id,$var[$i],'tipologia');
              $tipologia++;
            } else {
              wp_set_object_terms($post_id,$var[$i],'tipologia',true);
            }
          }else{
            if($categoria == 1){
              wp_set_object_terms($post_id,$var[$i],'categoria');
              $categoria++;
            } else {
              wp_set_object_terms($post_id,$var[$i],'categoria',true);
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
            wp_set_object_terms($post_id,$var[$i],'regionemappa');
          } else {
            wp_set_object_terms($post_id,$var[$i],'regionemappa',true);
          }
        }
      }

      //stato da splittare
      $var = explode(",",$data[14]);
      $varNum = count($var)-1;
      if ($varNum >= 1){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            wp_set_object_terms($post_id,$var[$i],'stato');
          } else {
            wp_set_object_terms($post_id,$var[$i],'stato',true);
          }
        }
      }

      //rete
      $var = explode(",",$data[17]);
      $varNum = count($var)-1;
      if ($varNum >= 1){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            wp_set_object_terms($post_id,$var[$i],'rete');
          } else {
            wp_set_object_terms($post_id,$var[$i],'rete',true);
          }
        }
      }



      //update_post_meta($post_id, "Mappa_Latitudine", $_POST["Mappa_Latitudine"]);
      //update_post_meta($post_id, "Mappa_Longitudine", $_POST["Mappa_Longitudine"]);

      if($indirizzo) {
          update_post_meta($post_id, "Mappa_Indirizzo", $indirizzo);
      }
      if($data[11]) {
          update_post_meta($post_id, "Mappa_Sito", $data[11]);
      }
      if($data[9]) {
          update_post_meta($post_id, "Mappa_Email", $data[9]);
      }
      if($data[10]) {
          update_post_meta($post_id, "Mappa_Telefono", $data[10]);
      }
      if($data[12]) {
          update_post_meta($post_id, "Mappa_FB", $data[12]);
      }
      if($data[13]) {
          update_post_meta($post_id, "mappa_TW", $data[13]);
      }
      if($data[15]) {
          update_post_meta($post_id, "Mappa_VideoYT", $data[15]);
      }


    }

    $row++;
  }
  echo "</table>";
  fclose($handle);
} else {
  echo "<p>Non riesco ad aprire il file!</p>";
}
 ?>
