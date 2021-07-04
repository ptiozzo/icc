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
  if ( is_page('grazie') ) {
    return dirname( __FILE__ ) . '/page-grazie.php';
  }
  return $template;
}

if ($_GET['destinazione']) {
  add_filter( 'jetpack_open_graph_image_default', 'custom_jetpack_default_image' );
}
function custom_jetpack_default_image() {
  return get_template_directory_uri().'/plugin/contribuisci/img/'.$_GET['destinazione'].'.png';
}



?>
