<?php
$Regione1 = $_GET["regione"] ? $_GET["regione"] : "tutteleregioni";
$post_per_page = -1;

if($Regione1 != "tutteleregioni"){
  $filtroRegione = array(
    'taxonomy' => 'mapparegione',
    'field'    => 'slug',
    'terms'    => $Regione1,
  );
} else {
  $filtroRegione = '';
}

$argsAllMappa = array(
  'post_type' => array('mappa'),
  'posts_per_page' => $post_per_page,
  'post_status' => 'any',
  'tax_query' => array(
      'relation' => 'AND',
      $filtroRegione,
    ),
);

$loopAllMappa = new WP_Query( $argsAllMappa );

$row = 0;


if($loopAllMappa->have_posts()):
  global $post;
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="export_mappa.csv";');

  // open the "output" stream
  // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
  $f = fopen('php://output', 'w');
  ob_end_clean();

  while($loopAllMappa->have_posts()){

    if($row == 0){
     $line = array('Riga','ID','Titolo','Stato','Autore','Slug','Regione','Categoria','Tipologia','Rete','TAG',
     'Chiuso motivazione','Chiuso data','Contenuto','Video YT','Latitudine','Longitudine',
     'Indirizzo','Sito','Email','Telefono','Facebook','Instagram','YouTube','Linkedin',
     'Twitter','Post status','Legale rappresentante','Termini e condizioni','Ultima modifica');
    } else {
      $loopAllMappa->the_post();
      $term1 = "mapparegione";
      $regione = "";
      $terms = get_the_terms( $post->ID , $term1 );
      if ($terms != ""){
        foreach ( $terms as $term ) {
          if($term->parent == 0){
            $regione .= $term->slug.",";
          }
        }
        foreach ( $terms as $term ) {
          if($term->parent != 0){
            $regione .= $term->slug.",";
          }
        }
      }
      $term1 = "mappastato";
      $stato = "";
      $terms = get_the_terms( $post->ID , $term1 );
      if ($terms != ""){
        foreach ( $terms as $term ) {
          if($term->parent == 0){
            $stato .= $term->slug.",";
          }
        }
        foreach ( $terms as $term ) {
          if($term->parent != 0){
            $stato .= $term->slug.",";
          }
        }
      }
      $term1 = "mappacategoria";
      $categoria = "";
      $terms = get_the_terms( $post->ID , $term1 );
      if ($terms != ""){
        foreach ( $terms as $term ) {
          if($term->parent == 0){
            $categoria .= $term->slug.",";
          }
        }
        foreach ( $terms as $term ) {
          if($term->parent != 0){
            $categoria .= $term->slug.",";
          }
        }
      }
      $term1 = "mappatipologia";
      $tipologia = "";
      $terms = get_the_terms( $post->ID , $term1 );
      if ($terms != ""){
        foreach ( $terms as $term ) {
          if($term->parent == 0){
            $tipologia .= $term->slug.",";
          }
        }
        foreach ( $terms as $term ) {
          if($term->parent != 0){
            $tipologia .= $term->slug.",";
          }
        }
      }
      $term1 = "mapparete";
      $rete = "";
      $terms = get_the_terms( $post->ID , $term1 );
      if ($terms != ""){
        foreach ( $terms as $term ) {
          if($term->parent == 0){
            $rete .= $term->slug.",";
          }
        }
        foreach ( $terms as $term ) {
          if($term->parent != 0){
            $rete .= $term->slug.",";
          }
        }
      }
      $term1 = "mappatag";
      $tag = "";
      $terms = get_the_terms( $post->ID , $term1 );
      if ($terms != ""){
        foreach ( $terms as $term ) {
          if($term->parent == 0){
            $tag .= $term->slug.",";
          }
        }
        foreach ( $terms as $term ) {
          if($term->parent != 0){
            $tag .= $term->slug.",";
          }
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
       'contenuto',
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
       get_post_status(),
       get_post_meta( $post->ID, 'Mappa_legaleRappresentante',true),
       get_post_meta( $post->ID, 'Mappa_privacy',true),
       get_the_modified_date("d F Y")
     );
   }
    $row++;
    fputcsv($f, $line, ";");
  }
fclose( $f );
endif;

// flush buffer
ob_flush();

// use exit to get rid of unexpected output afterward
exit();
?>
