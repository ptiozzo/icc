<?php

add_filter( 'wpseo_opengraph_image', 'change_regioni_opengraph_image_url' );
function change_regioni_opengraph_image_url( $url ) {
  if ( is_page('piemonte') || cat_is_ancestor_of( 2299, $catID)){
    return get_template_directory_uri().'/assets/img/modules/piemonte/Piemonte-mappa2.png';
  }
  if ( is_page('liguria') || cat_is_ancestor_of( 2359, $catID)){
    return get_template_directory_uri().'/assets/img/modules/liguria/liguria-2.png';
  }
}

 ?>
