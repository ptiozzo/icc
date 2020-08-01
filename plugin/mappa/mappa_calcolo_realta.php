<?php
function mappa_calcolo_realta(){
  //numero realtà totali
  $argsMappa = array(
    'post_type' => 'mappa',
    'post_status' => 'publish',
    'meta_query' => array(
      array(
        'key' => 'Mappa_Latitudine',
        'compare'    => 'EXISTS',
      ),
    ),
    'tax_query' => array(
      array(
        'taxonomy'=> 'mappastato',
        'field'    => 'slug',
        'terms'    => 'utente',
        'operator' => 'NOT IN',
      ),
    ),
  );
  $loopMappa = new WP_Query( $argsMappa );
  update_option("icc_mappa_realta_totale",$loopMappa->found_posts,"no");
  update_option("icc_mappa_realta_totale_lastupdate",strtotime(date('Y-m-d H:i:s')),'no');
  wp_reset_postdata();

  //numero realtà per regione
  $terms = get_terms( array(
    'taxonomy' => 'mapparegione',
    'hide_empty' => false,
    'parent' => 0,
  ) );
  foreach ($terms as $key ) {
    $argsMappa = array(
      'post_type' => 'mappa',
      'tax_query' => array(
          array(
            'taxonomy' => 'mapparegione',
            'field'    => 'slug',
            'terms'    => $key->slug,
          ),
        ),
      );
    $loopMappa = new WP_Query( $argsMappa );
    update_option("icc_mappa_realta_".$key->slug,$loopMappa->found_posts,"no");
    wp_reset_postdata();
  }
  update_option("icc_mappa_realta_lastupdate",strtotime(date('Y-m-d H:i:s')),'no');


  //numero realtà per rete
  $terms = get_terms( array(
    'taxonomy' => 'mapparete',
    'hide_empty' => false,
  ) );
  $reti = 0;
  foreach ($terms as $key ) {
    $reti++;
    $argsMappa = array(
      'post_type' => 'mappa',
      'tax_query' => array(
          array(
            'taxonomy' => 'mapparete',
            'field'    => 'slug',
            'terms'    => $key->slug,
          ),
        ),
      );
    $loopMappa = new WP_Query( $argsMappa );
    update_option("icc_mappa_rete_".$key->slug,$loopMappa->found_posts,"no");
    wp_reset_postdata();
  }
  update_option("icc_mappa_rete_lastupdate",strtotime(date('Y-m-d H:i:s')),'no');

  //numero di reti
  update_option("icc_mappa_rete_totale",$reti,'no');

  $filtroLatLong = array(
    'key' => 'Mappa_Latitudine',
    'compare'    => 'EXISTS',
  );

  $argsMappaArchivio = array(
    'post_type' => array('mappa'),
    'posts_per_page' => -1,
    's' => $Realta1,
    'meta_query' => array(
        $filtroLatLong,
      )
  );

  $loopMappaArchivio = new WP_Query( $argsMappaArchivio );
  if($loopMappaArchivio->have_posts()){

    //Imposto transient per tutti i puntini
    $tuttiIPuntini = "[";
    while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();

      if(get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) && get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)){
        $tuttiIPuntini .= "[".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).", ".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],";
      }

    endwhile;
    $tuttiIPuntini .= "]";
    set_transient('icc_mappa_tuttipuntini',$tuttiIPuntini);
    set_transient('icc_mappa_tuttipuntini_lastupdate',strtotime(date('Y-m-d H:i:s')));

    //Imposto transient per tutti i popup
    while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();
    $popupMappa = "";
    if ( has_post_thumbnail() ){
        $popupMappa .= "<img class='img-fluid' src='".get_the_post_thumbnail_url('')."' ><br>";
    }
    $popupMappa .= "<h3 class='h5'>".get_the_title()."</h3>";
    $popupMappa .= get_the_excerpt();
    $popupMappa .= "<br>";
    $popupMappa .= "<a href='".get_the_permalink()."'>Approfondisci</a>";
    if(get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) && get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)){
      $popupMappaScript .= "<script>\r\n";
        $popupMappaScript .= "var title = \"". $popupMappa."\";\r\n";
        $popupMappaScript .= "var altPuntino = \"". get_the_title() ."\";\r\n";
        $popupMappaScript .= "var puntino = L.marker([".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).",".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],{title: altPuntino,";
          if(get_the_terms( get_the_ID() , 'mappastato' )[0]->slug == "utente" ){
            $popupMappaScript .= "icon: redIcon";
          }
        $popupMappaScript .= "});\r\n";
        $popupMappaScript .= "puntino.bindPopup(title,{maxWidth : 250});\r\n";
        $popupMappaScript .= "markers.addLayer(puntino);\r\n";
      $popupMappaScript .= "</script>";
    }
    endwhile;
    set_transient('icc_mappa_tuttipopup',$popupMappaScript);
    set_transient('icc_mappa_tuttipopup_lastupdate',strtotime(date('Y-m-d H:i:s')));
  }



}

 ?>
