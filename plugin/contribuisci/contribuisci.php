<?php

require_once('stripe-php/init.php');


/*  DB contribuisci
/* ------------------------------------ */
require 'contribuisci-db.php';


add_filter('template_include', 'icc_custom_page_contribuisci');
function icc_custom_page_contribuisci( $template ) {
  if ( is_page('contribuisci') ) {
    return dirname( __FILE__ ) . '/page-contribuisci.php';
  }
  return $template;
}

?>
