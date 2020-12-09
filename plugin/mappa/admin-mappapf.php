<?php


$daImportare = 1000;

if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPAtd . 'wp-admin/includes/post.php' );
}
?>
<?php

echo "<h2>EXPORT MAPPA PF</h2>";
$row = 1;
?>

<form method="post" action="<?php echo get_pagenum_link(); ?>">
  <input name="update_button" type="Submit" value="Update" class="">
</form>

<?php
$myFile = get_template_directory()."/plugin/mappa/export-mappaLuca.csv";
echo $myFile."<br>";
if (!file_exists($myFile)) {
  print 'File not found';
}
if (($handle = fopen($myFile, "r")) !== FALSE) {
  echo "<table style='border: 1px solid grey; min-widtd: 10px; overflow: scroll;'>";
  echo "<tr>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Row</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Nome realtà</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Descrizione</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Categoria/Tipologia</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Regione</th>";
    //echo "<th style='border: 1px solid grey; min-width: 10px;'>Via</th>";//4
    //echo "<th style='border: 1px solid grey; min-width: 10px;'>Civico</th>";//5
    //echo "<th style='border: 1px solid grey; min-width: 10px;'>CAP</th>";//6
    //echo "<th style='border: 1px solid grey; min-width: 10px;'>Città</th>";//7
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Indirizzo</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Longitudine</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Latitudine</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Slug</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>email</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Telefono</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Sito</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>FB</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Twitter</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Stato</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Video YT</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Approfondisci su ICC</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Rete</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Instagram</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Motivazione chiusura</th>";
    echo "<th style='border: 1px solid grey; min-width: 10px;'>Autore</th>";
  echo "</tr>";
  while (($data = fgetcsv($handle, 100, ",",'"')) !== FALSE && $row <= $daImportare) {
      echo "<tr>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$row."</td>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[0]."</td>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>"."descrizione"."</td>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[2]."</td>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[3]."</td>";
      $indirizzo = "";
      if($data[4]){
        $indirizzo.= $data[4]." ";
      }
      if($data[5]){
        $indirizzo.= $data[5]." ";
      }
      if($data[6]){
        $indirizzo.= $data[6]." ";
      }
      if($data[7]){
        $indirizzo.= $data[7]." ";
      }
      //echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[4]."</td>";
      //echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[5]."</td>";
      //echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[6]."</td>";
      //echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[7]."</td>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$indirizzo."</td>";
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[8]."</td>";//Longitidine
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[9]."</td>";//Latitudine
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[10]."</td>";//slug
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[11]."</td>";//email
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[12]."</td>";//Telefono
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[13]."</td>";//Sito
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[14]."</td>";//FB
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[15]."</td>";//Twitter
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[16]."</td>";//Stato
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[17]."</td>";//VideoYT
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[18]."</td>";//Approfondisci ICC
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[19]."</td>";//Rete
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[20]."</td>";//Instagram
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[21]."</td>";//Chiusura
      echo "<td style='border: 1px solid grey; min-widtd: 10px;'>".$data[22]."</td>";//Autore
      echo "</tr>";

      if($_POST['update_button']){
        $post_id = post_exists( ucfirst($data[0]),'','','mappa');

        update_post_meta($post_id, "Mappa_Latitudine",$data[9] );
        update_post_meta($post_id, "Mappa_Longitudine",$data[8] );
        update_post_meta($post_id, "Mappa_VideoYT",$data[8] );
        update_post_meta($post_id, "Mappa_Indirizzo",$indirizzo );
        update_post_meta($post_id, "Mappa_Sito",$data[13] );
        update_post_meta($post_id, "Mappa_Email",$data[11] );
        update_post_meta($post_id, "Mappa_Telefono",$data[12] );
        update_post_meta($post_id, "Mappa_FB",$data[14] );
        update_post_meta($post_id, "Mappa_IG",$data[20] );
        update_post_meta($post_id, "Mappa_YT",$data[17] );
        update_post_meta($post_id, "Mappa_TW",$data[15] );
        update_post_meta($post_id, "Mappa_Chiuso_Motivazione",$data[21] );



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
