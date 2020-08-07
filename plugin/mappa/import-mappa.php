<?php get_header();

$daImportare = 100;

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
  while (($data = fgetcsv($handle, 100, ",",'"')) !== FALSE && $row <= $daImportare) {
    //if(post_exists( ucfirst($data[0]),'','','mappa') == 0){
      echo "<tr style='border: 1px solid grey; min-width: 10px;'>";
      $num = count($data);
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$row . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[0] . "</td>\n";
      /*echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[1] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[2] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[3] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[4] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[5] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[6] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[7] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[8] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[9] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[10] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[11] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[12] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[13] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[14] . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[15] . "</td>\n";
    */  echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[16] . "</td>\n";

      //stato da splittare
      $post_id = post_exists( ucfirst($data[0]),'','','mappa');
      $var = explode(",",$data[16]);
      $varNum = count($var);
      if ($varNum >= 1 && $post_id != 0){
        for ($i=0; $i < $varNum; $i++) {
          $var[$i] = trim($var[$i]);
          if($i == 0){
            wp_set_object_terms($post_id,$var[$i],'mappastato');
          } else {
            wp_set_object_terms($post_id,$var[$i],'mappastato',true);
          }
        }
      }
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$post_id."</td>";


      //echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[0] . "</td>\n";//nome realtà

      //da splittare Stato
      $var = explode(",",$data[16]);
      $varNum = count($var);

      echo "<td style='border: 1px solid grey; min-width: 10px;'><ul>";
      echo $varNum." ";
      for ($i=0; $i < $varNum; $i++) {
          echo "<li>".$var[$i]."</li>";
      }

      echo "</tr>";
    //}
    //echo "<!-- --".$data[10].": ".post_exists( ucfirst($data[0]),'','','mappa')."-- -->";


    $row++;
  }
  echo "</table>";
  fclose($handle);
  mappa_calcolo_realta();
} else {
  echo "<p>Non riesco ad aprire il file!</p>";
}
 ?>
