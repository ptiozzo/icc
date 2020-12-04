<?php get_header();

if ( ! current_user_can( 'administrator' ) ) {
  ?>
  <script>
    window.location.href = "/mappa/";
  </script>

  <?php
}


$daImportare = 50;

if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}
?>
<?php

echo "<h2>IMPORT MAPPA</h2>";
$row = 1;

$realtaOK = 0;
$realtaAggiornate = 0;
$realtaDaAggiornareAMano = 0;


$myFile = get_template_directory()."/plugin/mappa/export-mappa.csv";
echo $myFile."<br>";
if (!file_exists($myFile)) {
  print 'File not found';
}
if (($handle = fopen($myFile, "r")) !== FALSE) {
  echo "<table style='border: 1px solid grey; min-width: 10px;'>";
  echo "<tr>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Row</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Titolo</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Slug</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Autore</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>AutoreID</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>PostID</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Autore attuale</th>";
  echo "</tr>";
  while (($data = fgetcsv($handle, 100, ",",'"')) !== FALSE && $row <= $daImportare) {
    {

      $userID = get_user_by('login', $data[22] )->id;
      if(!$userID){
        $userID = "Non trovato";
        echo "<tr style='border: 1px solid grey; background: pink; min-width: 10px;'>";
        $realtaDaAggiornareAMano++;
      } else {

         $author_id = get_post_field ('post_author', post_exists( ucfirst($data[0]),'','','mappa'));
         $display_name = get_the_author_meta( 'display_name' , $author_id );

         if( $data[22] != $display_name ){

           echo "<tr style='border: 1px solid grey; background: red; min-width: 10px;'>";


          if( is_numeric($userID) && post_exists( ucfirst($data[0]),'','','mappa') != 0 ){

              $my_post = array(
                'ID'           => post_exists( ucfirst($data[0]),'','','mappa'),
                'post_author'   => $userID,
              );

              // Update the post into the database
              wp_update_post( $my_post );
              $realtaAggiornate++;

          }


        } else{
          echo "<tr style='border: 1px solid grey; background: green; min-width: 10px;'>";
          $realtaOK++;
        }
      }

      $num = count($data);
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$row . "</td>\n";
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[0] . "</td>\n";//nome realtà
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[10] . "</td>\n";//slug
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".$data[22] . "</td>\n";//autore
      echo "<td style='border: 1px solid grey; min-width: 10px;'>". $userID  . "</td>\n";//AutoreID
      echo "<td style='border: 1px solid grey; min-width: 10px;'>".post_exists( ucfirst($data[0]),'','','mappa') . "</td>\n";//PostID

      echo "<td style='border: 1px solid grey; min-width: 10px;'>". $display_name . "</td>\n";//Autore attuale



      echo "</tr>";



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

echo "Realtà ok: ". $realtaOK ."<br>";
echo "Realtà aggiornare: ". $realtaAggiornate ."<br>";
echo "Realtà da aggiornare a mano: ". $realtaDaAggiornareAMano ."<br>";
 ?>
