<?php get_header();

if ( ! current_user_can( 'administrator' ) ) {
  ?>
  <script>
    window.location.href = "/mappa/";
  </script>

  <?php
}


$daImportare = 5000;

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
    {

      $userID = get_user_by('login', $data[22] )->id;
      if(!$userID){
        $userID = "Non trovato";
      }


      if( is_numeric($userID) && post_exists( ucfirst($data[0]),'','','mappa')!= 0){
          $my_post = array(
            'ID'           => post_exists( ucfirst($data[0]),'','','mappa'),
            'post_author'   => $userID,
          );

          echo $row."-";
          echo post_exists( ucfirst($data[0]),'','','mappa');
          echo "-";
          echo $userID;
          echo "<br>";

          // Update the post into the database
          wp_update_post( $my_post );
          if (is_wp_error(post_exists( ucfirst($data[0]),'','','mappa'))) {
              $errors = post_exists( ucfirst($data[0]),'','','mappa')->get_error_messages();
              foreach ($errors as $error) {
                  echo $error;
              }
          }
    } else {
      echo "<tr style='border: 1px solid grey; min-width: 10px;'>";
      $num = count($data);
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$row . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[0] . "</td>\n";//nome realtà
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[10] . "</td>\n";//slug
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[22] . "</td>\n";//autore
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".post_exists( ucfirst($data[0]),'','','mappa') . "</td>\n";//PostID

      echo "<td style='border: 1px solid grey; min-width: 10px;'>". $userID  . "</td>\n";//PostID
      echo "</tr>";
    }


    }
    echo "<!-- --".$data[0].": ".post_exists( ucfirst($data[0]),'','','mappa')."-- -->";

    //if( post_exists( ucfirst($data[0]),'','','mappa') == 0 && $row <= $daImportare && $row > 1){
    //}
    $row++;
  }
  echo "</table>";
  fclose($handle);
  mappa_calcolo_realta();
} else {
  echo "<p>Non riesco ad aprire il file!</p>";
}
 ?>
