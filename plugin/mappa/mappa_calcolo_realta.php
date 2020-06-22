<?php
function mappa_calcolo_realta(){
  //numero realtà totali
  $argsMappa = array(
    'post_type' => 'mappa',
  );
  $loopMappa = new WP_Query( $argsMappa );
  update_option("icc_mappa_realta_totale",$loopMappa->found_posts,"no");
  update_option("icc_mappa_realta_totale_lastupdate",strtotime(date('Y-m-d H:i:s')),'no');
  wp_reset_postdata();

  //numero realtà per regione
  $terms = get_terms( array(
    'taxonomy' => 'regionemappa',
    'hide_empty' => false,
  ) );
  foreach ($terms as $key ) {
    $argsMappa = array(
      'post_type' => 'mappa',
      'tax_query' => array(
          array(
            'taxonomy' => 'regionemappa',
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
    'taxonomy' => 'rete',
    'hide_empty' => false,
  ) );
  $reti = 0;
  foreach ($terms as $key ) {
    $reti++;
    $argsMappa = array(
      'post_type' => 'mappa',
      'tax_query' => array(
          array(
            'taxonomy' => 'rete',
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

}

 ?>
