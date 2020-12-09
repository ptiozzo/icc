<h2>EXPORT MAPPA</h2>

<form method="post" action="<?php echo get_pagenum_link(); ?>">
  <input name="download_button" type="Submit" value="Download" class="">
</form>

<?php

$argsAllMappa = array(
  'post_type' => array('mappa'),
  'posts_per_page' => -1,
  'post_status' => 'any',
);
$loopAllMappa = new WP_Query( $argsAllMappa );

if($loopAllMappa->have_posts()){
  global $post;
  ?>
  <style>
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
  }
  </style>
  <?php

  if($_POST['download_button']){
    $row = 0;
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="export_mappa.csv";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');
    ob_end_clean();
    while($loopAllMappa->have_posts()){
      $loopAllMappa->the_post();

      if($row == 0){
       $line = array('Riga','ID','Titolo','Stato','Autore','Slug','Regione','Categoria','Tipologia','Rete','TAG',
       'Chiuso motivazione','Chiuso data','Contenuto','Video YT','Latitudine','Longitudine',
       'Indirizzo','Sito','Email','Telefono','Facebook','Instagram','YouTube','Linkedin',
       'Twitter','Post status');
      } else {
        $term1 = "mapparegione";
        $regione = "";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          foreach ( $terms as $term ) {
            $regione .= $term->slug.",";
          }
        }
        $term1 = "mappastato";
        $stato = "";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          foreach ( $terms as $term ) {
            $stato .= $term->slug.",";
          }
        }
        $term1 = "mappacategoria";
        $categoria = "";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          foreach ( $terms as $term ) {
            $categoria .= $term->slug.",";
          }
        }
        $term1 = "mappatipologia";
        $tipologia = "";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          foreach ( $terms as $term ) {
            $tipologia .= $term->slug.",";
          }
        }
        $term1 = "mapparete";
        $rete = "";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          foreach ( $terms as $term ) {
            $rete .= $term->slug.",";
          }
        }
        $term1 = "mappatag";
        $tag = "";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          foreach ( $terms as $term ) {
            $tag .= $term->slug.",";
          }
        }
       $line = array(
         $row,
         get_the_ID(),
         get_the_title(),
         $stato,
         get_the_author(),
         $post->post_name,
         $regione,
         $categoria,
         $tipologia,
         $rete,
         $tag,
         get_post_meta( $post->ID, 'Mappa_Chiuso_Motivazione',true),
         get_post_meta( $post->ID, 'Mappa_Chiuso_Data',true),
         get_the_content(),
         get_post_meta( $post->ID, 'Mappa_VideoYT',true),
         get_post_meta( $post->ID, 'Mappa_Latitudine',true),
         get_post_meta( $post->ID, 'Mappa_Longitudine',true),
         get_post_meta( $post->ID, 'Mappa_Indirizzo',true),
         get_post_meta( $post->ID, 'Mappa_Sito',true),
         get_post_meta( $post->ID, 'Mappa_Email',true),
         get_post_meta( $post->ID, 'Mappa_Telefono',true),
         get_post_meta( $post->ID, 'Mappa_FB',true),
         get_post_meta( $post->ID, 'Mappa_IG',true),
         get_post_meta( $post->ID, 'Mappa_YT',true),
         get_post_meta( $post->ID, 'Mappa_IN',true),
         get_post_meta( $post->ID, 'Mappa_TW',true),
         get_post_status()
       );
     }
      $row++;
      fputcsv($f, $line, ";");
    }
    fclose( $f );

    // flush buffer
    ob_flush();

    // use exit to get rid of unexpected output afterward
    exit();
  }
  $row = 0;
  echo "<table style='border:1px solid black;'>";
  echo "<tr>";
  echo "<th>Riga</th>";
  echo "<th>ID</th>";
  echo "<th>Titolo</th>";
  echo "<th>Stato</th>";
  echo "<th>Autore</th>";
  echo "<th>Slug</th>";
  echo "<th>Regione</th>";
  echo "<th>Categoria</th>";
  echo "<th>Tipologia</th>";
  echo "<th>Rete</th>";
  echo "<th>TAG</th>";
  echo "<th>Chiuso motivazione</th>";
  echo "<th>Chiuso data</th>";
  echo "<th>Contenuto</th>";
  echo "<th>Video YT</th>";
  echo "<th>Latitudine</th>";
  echo "<th>Longitudine</th>";
  echo "<th>Indirizzo</th>";
  echo "<th>Sito</th>";
  echo "<th>Email</th>";
  echo "<th>Telefono</th>";
  echo "<th>Facebook</th>";
  echo "<th>Instagram</th>";
  echo "<th>YouTube</th>";
  echo "<th>Linkedin</th>";
  echo "<th>Twitter</th>";
  echo "<th>Post status</th>";
  echo "</tr>";
  while($loopAllMappa->have_posts()){
    $loopAllMappa->the_post();
    $row++;
    echo "<tr>";
    echo "<td>".$row."</td>";
    echo "<td><a href='".get_edit_post_link(get_the_ID())."'>".get_the_ID()."</a></td>";
    echo "<td>". get_the_title()."</td>";
    //STATO
    echo "<td>";
    $term1 = "mappastato";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        echo $term->slug.",";
      }
    }
    echo "</td>";
    echo "<td>". get_the_author()."</td>";
    echo "<td>". $post->post_name."</td>";
    //REGIONE
    echo "<td>";
    $term1 = "mapparegione";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        echo $term->slug.",";
      }
    }
    echo "</td>";
    //CATEGORIA
    echo "<td>";
    $term1 = "mappacategoria";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        echo $term->slug.",";
      }
    }
    //TIPOLOGIA
    echo "<td>";
    $term1 = "mappatipologia";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        echo $term->slug.",";
      }
    }
    echo "</td>";
    //RETE
    echo "<td>";
    $term1 = "mapparete";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        echo $term->slug.",";
      }
    }
    echo "</td>";
    //TAG
    echo "<td>";
    $term1 = "mappatag";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        echo $term->slug.",";
      }
    }
    echo "</td>";

    echo "<td>".get_post_meta( $post->ID, 'Mappa_Chiuso_Motivazione',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Chiuso_Data',true)."</td>";
    echo "<td>Contenuto</td>";// echo "<td>".get_the_content()."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_VideoYT',true)."</td>";
    if(get_post_meta( $post->ID, 'Mappa_Latitudine',true)){
      echo "<td>".get_post_meta( $post->ID, 'Mappa_Latitudine',true)."</td>";
    }else{
      echo "<td style='background-color: red;'>".get_post_meta( $post->ID, 'Mappa_Latitudine',true)."</td>";
    }

    if(get_post_meta( $post->ID, 'Mappa_Latitudine',true)){
      echo "<td>".get_post_meta( $post->ID, 'Mappa_Latitudine',true)."</td>";
    }else{
      echo "<td style='background-color: red;'>".get_post_meta( $post->ID, 'Mappa_Latitudine',true)."</td>";
    }

    echo "<td>".get_post_meta( $post->ID, 'Mappa_Indirizzo',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Sito',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Email',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Telefono',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_FB',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_IG',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_YT',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_IN',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_TW',true)."</td>";
    echo "<td>".get_post_status()."</td>";




    echo "</tr>";
  }
  echo "</table>";
}


?>
