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
  add_filter( "rank_math/opengraph/facebook/image", function(  ) {
  	return get_template_directory_uri().'/plugin/contribuisci/img/'.$_GET['destinazione'].'.png';
  });
}



add_filter('wp_body_open', 'icc_contribuisci_popup');
function icc_contribuisci_popup(){
  include 'contribuisci-popup.php';
}

?>
