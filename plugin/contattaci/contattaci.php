<?php

add_filter('template_include', 'icc_custom_page_contattaci');
function icc_custom_page_contattaci( $template ) {
  if ( is_page('contattaci') ) {
    return dirname( __FILE__ ) . '/page-contattaci.php';
  }
  return $template;
}

 ?>
